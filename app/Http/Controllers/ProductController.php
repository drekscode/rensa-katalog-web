<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllProduct()
    {
        return ProductResource::collection(Product::with('series')->orderBy('id', 'asc')->get());
    }
    
}
