<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Series;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('series')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_product', 'like', "%{$search}%")
                  ->orWhereHas('series', function($q) use ($search) {
                      $q->where('nama_series', 'like', "%{$search}%");
                  });
        }

        $products = $query->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $series = Series::all();
        return view('admin.product.create', compact('series'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'series_id' => 'required|exists:series,id',
            'nama_product' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'big_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $base64 = base64_encode(file_get_contents($file));
            $validated['thumbnail'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        if ($request->hasFile('big_pic')) {
            $file = $request->file('big_pic');
            $base64 = base64_encode(file_get_contents($file));
            $validated['big_pic'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        Product::create($validated);
        
        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.product.create')
                ->with('success', 'Product created successfully. You can add another one below.');
        }

        return redirect()->route('admin.product.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $series = Series::all();
        return view('admin.product.edit', compact('product', 'series'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'series_id' => 'required|exists:series,id',
            'nama_product' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'big_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $base64 = base64_encode(file_get_contents($file));
            $validated['thumbnail'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        if ($request->hasFile('big_pic')) {
            $file = $request->file('big_pic');
            $base64 = base64_encode(file_get_contents($file));
            $validated['big_pic'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        $product->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.product.create')
                ->with('success', 'Product updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.product.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product deleted successfully.');
    }
}
