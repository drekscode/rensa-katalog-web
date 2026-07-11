<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $productsQuery = Product::with('series')->latest();

        if ($request->has('search') && $search) {
            $productsQuery->where(function($q) use ($search) {
                $q->where('nama_product', 'like', "%{$search}%")
                  ->orWhereHas('series', function($sq) use ($search) {
                      $sq->where('nama_series', 'like', "%{$search}%");
                  });
            });
        }

        $products = $productsQuery->paginate(24)->withQueryString();

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
            'nama_product' => 'required|string|max:255|unique:product,nama_product',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'big_pic' => 'nullable|array',
            'big_pic.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('products/thumbnails', 'public');
        }

        if ($request->hasFile('big_pic')) {
            $bigPics = [];
            foreach ($request->file('big_pic') as $file) {
                $bigPics[] = $file->store('products/big_pics', 'public');
            }
            $validated['big_pic'] = $bigPics;
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
            'nama_product' => 'required|string|max:255|unique:product,nama_product,' . $product->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'big_pic' => 'nullable|array',
            'big_pic.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail && !str_starts_with($product->thumbnail, 'data:')) {
                Storage::disk('public')->delete($product->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('products/thumbnails', 'public');
        }

        if ($request->hasFile('big_pic')) {
            if ($product->big_pic && is_array($product->big_pic)) {
                foreach ($product->big_pic as $old_pic) {
                    if ($old_pic && !str_starts_with($old_pic, 'data:')) {
                        Storage::disk('public')->delete($old_pic);
                    }
                }
            }
            $bigPics = [];
            foreach ($request->file('big_pic') as $file) {
                $bigPics[] = $file->store('products/big_pics', 'public');
            }
            $validated['big_pic'] = $bigPics;
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
        if ($product->thumbnail && !str_starts_with($product->thumbnail, 'data:')) {
            Storage::disk('public')->delete($product->thumbnail);
        }
        if ($product->big_pic && is_array($product->big_pic)) {
            foreach ($product->big_pic as $pic) {
                if ($pic && !str_starts_with($pic, 'data:')) {
                    Storage::disk('public')->delete($pic);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product deleted successfully.');
    }
}
