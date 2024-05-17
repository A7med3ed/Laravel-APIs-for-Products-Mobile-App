<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\Cafe;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json(['products' => $products], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cafe_id' => 'required|exists:cafes,id',
            'productName' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::create([
            'cafe_id' => $request->cafe_id,
            'productName' => $request->productName,
        ]);

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 200);
    }

    public function getProductByCafeName($cafeName)
    {
        $cafe = Cafe::where('cafeName', $cafeName)->first();

        if (!$cafe) {
            return response()->json(['message' => 'Cafe not found'], 404);
        }

        $products = Product::where('cafe_id', $cafe->id)->get();

        return response()->json(['products' => $products], 200);
    }
}
