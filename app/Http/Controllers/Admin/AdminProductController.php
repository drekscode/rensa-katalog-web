<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Series;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('series')->latest()->paginate(10);
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
            'thumbnail' => 'nullable|string',
            'big_pic' => 'nullable|string',
        ]);

        Product::create($validated);

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
            'thumbnail' => 'nullable|string',
            'big_pic' => 'nullable|string',
        ]);

        $product->update($validated);

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
