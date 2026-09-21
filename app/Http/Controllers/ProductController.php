<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }
}