<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;

class CafeController extends Controller
{
    
    public function index()
    {
        $cafes = Cafe::all();

        return response()->json(['cafes' => $cafes], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cafeName' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $cafe = Cafe::create($request->all());

        return response()->json(['message' => 'Cafe created successfully', 'cafe' => $cafe], 200);
    }
    
    public function getCafesByProductName($productName)
    {
        $cafes = Cafe::whereHas('products', function ($query) use ($productName) {
            $query->where('productName', $productName);
        })->get();

        return response()->json(['cafes' => $cafes], 200);
    }

}
