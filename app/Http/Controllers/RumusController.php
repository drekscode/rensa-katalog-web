<?php

namespace App\Http\Controllers;

use App\Models\Rumus;
use Illuminate\Http\Request;

use App\Http\Resources\RumusResource;

class RumusController extends Controller
{
    public function getRumusByKategori($kategoriId)
    {
        $rumuses = Rumus::where('kategori_id', $kategoriId)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'data' => RumusResource::collection($rumuses),
        ]);
    }

    /**
     * Calculate material requirements based on formula type.
     *
     * User inputs: panjang_bidang, lebar_bidang (in meters)
     * Admin inputs (from rumus record): panjang, lebar, lembar
     */
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'rumus_id' => 'required|exists:rumus,id',
            'panjang_bidang' => 'required|numeric|gt:0',
            'lebar_bidang' => 'required|numeric|gt:0',
        ]);

        $rumus = Rumus::with('kategori')->findOrFail($validated['rumus_id']);

        $panjangBidang = (float) $validated['panjang_bidang'];
        $lebarBidang = (float) $validated['lebar_bidang'];

        // Admin-set product dimensions (stored in meters)
        $panjangProduk = $rumus->panjang ? (float) $rumus->panjang : 0;
        $lebarProduk = $rumus->lebar ? (float) $rumus->lebar : 0;
        $lembarPcs = $rumus->lembar ? (int) $rumus->lembar : 0;

        $result = match ($rumus->rumus) {
            'Rumus Batang' => $this->hitungBatang($panjangBidang, $lebarBidang, $panjangProduk, $lebarProduk),
            'Rumus Box' => $this->hitungBox($panjangBidang, $lebarBidang, $panjangProduk, $lebarProduk, $lembarPcs),
            'Rumus M2' => $this->hitungM2($panjangBidang, $lebarBidang),
            default => null,
        };

        if ($result === null) {
            return response()->json(['message' => 'Tipe rumus tidak dikenali.'], 422);
        }

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error']], 422);
        }

        return response()->json([
            'kategori' => $rumus->kategori?->nama_kategori,
            'rumus' => $rumus->rumus === 'Rumus M2' ? 'Rumus M²' : $rumus->rumus,
            'total' => $result['total'],
            'satuan' => $result['satuan'],
            'label' => $result['label'],
        ]);
    }

    /**
     * Rumus Batang - exact match with Excel formulas.
     *
     * Jumlah Baris           = ROUNDUP(Lebar Bidang / Lebar Produk)
     * Batang Per Baris       = IF(Panjang Produk >= Panjang Bidang,
     *                             1 / ROUNDDOWN(Panjang Produk / Panjang Bidang),
     *                             ROUNDDOWN(Panjang Bidang / Panjang Produk))
     * Total Bidang Utama     = Jumlah Baris * Batang Per Baris
     * Sisa Batang            = IF(Panjang Produk >= Panjang Bidang, 0, Panjang Bidang - (Panjang Produk * Batang Per Baris))
     * Jumlah Potongan/Baris  = IF(Sisa = 0, 0, ROUNDDOWN(Panjang Produk / Sisa, 0))
     * Batang dari Sisa       = IF(Potongan = 0, 0, ROUNDUP(Jumlah Baris / Potongan, 0))
     * TOTAL BATANG           = Total Bidang Utama + Batang dari Sisa + 1
     */
    private function hitungBatang(float $panjangBidang, float $lebarBidang, float $panjangProduk, float $lebarProduk): array
    {
        if ($lebarProduk == 0 || $panjangProduk == 0) {
            return ['error' => 'Dimensi produk belum diatur oleh admin.'];
        }

        // Jumlah Baris = ROUNDUP(Lebar Bidang / Lebar Produk)
        $jumlahBaris = (int) ceil(round($lebarBidang / $lebarProduk, 10));

        // Batang Per Baris
        if ($panjangProduk >= $panjangBidang) {
            $divisor = (int) floor(round($panjangProduk / $panjangBidang, 10));
            $batangPerBaris = ($divisor == 0) ? 1.0 : (1.0 / $divisor);
        } else {
            $batangPerBaris = (float) floor(round($panjangBidang / $panjangProduk, 10));
        }

        // Total Bidang Utama
        $totalBidangUtama = ceil($jumlahBaris * $batangPerBaris);

        // Sisa Batang
        $sisaBatang = ($panjangProduk >= $panjangBidang) ? 0.0 : $panjangBidang - ($panjangProduk * $batangPerBaris);

        // Jumlah Potongan Per Baris
        // Round to 10 decimal places before floor to match Excel decimal arithmetic
        $jumlahPotongan = ($sisaBatang == 0) ? 0 : (int) floor(round($panjangProduk / $sisaBatang, 10));

        // Jumlah Batang dari Bidang Sisa
        $batangDariSisa = ($jumlahPotongan == 0) ? 0 : (int) ceil($jumlahBaris / $jumlahPotongan);

        // TOTAL BATANG (+ 1 cadangan sesuai Excel)
        $totalBatang = $totalBidangUtama + $batangDariSisa + 1;

        return [
            'total' => $totalBatang,
            'satuan' => 'batang',
            'label' => $totalBatang . ' Batang',
        ];
    }

    /**
     * Rumus Box - exact match with Excel formulas.
     *
     * Luas Produk = (Panjang Produk * Lebar Produk) * Lembar Pcs
     * Luas Bidang = Panjang Bidang * Lebar Bidang
     * TOTAL BOX   = ROUNDUP(Luas Bidang / Luas Produk)
     */
    private function hitungBox(float $panjangBidang, float $lebarBidang, float $panjangProduk, float $lebarProduk, int $lembarPcs): array
    {
        if ($panjangProduk == 0 || $lebarProduk == 0 || $lembarPcs == 0) {
            return ['error' => 'Dimensi produk atau lembar belum diatur oleh admin.'];
        }

        $luasProduk = ($panjangProduk * $lebarProduk) * $lembarPcs;
        $luasBidang = $panjangBidang * $lebarBidang;
        $totalBox = (int) ceil($luasBidang / $luasProduk);

        return [
            'total' => $totalBox,
            'satuan' => 'box',
            'label' => $totalBox . ' Box',
        ];
    }

    /**
     * Rumus M2 - exact match with Excel formula.
     *
     * TOTAL M2 = Panjang Bidang * Lebar Bidang
     */
    private function hitungM2(float $panjangBidang, float $lebarBidang): array
    {
        $totalM2 = round($panjangBidang * $lebarBidang, 2);

        return [
            'total' => $totalM2,
            'satuan' => 'm²',
            'label' => $totalM2 . ' M²',
        ];
    }
}
