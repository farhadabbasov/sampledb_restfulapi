<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductLine;
use Illuminate\Http\Request;

class ProductLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_lines = ProductLine::all();

        return response()->json($product_lines);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProductLine::create($request->only([
            'productLine',
            'textDescription',
            'htmlDescription',
            'image',
        ]));

        return response()->json("ProductLine created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ProductLine::where("productLine", $id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ProductLine::where("productLine", $id)->first->update($request->only([
            'productLine',
            'textDescription',
            'htmlDescription',
            'image',
        ]));

        return response()->json("ProductLine updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductLine::where("productLine", $id)->first()->delete();

        return response()->json("ProductLine deleted");
    }
}
