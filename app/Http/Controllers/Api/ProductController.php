<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->only([
            'productCode',
            'productName',
            'productLine',
            'productScale',
            'productVendor',
            'productDescription',
            'quantityInStock',
            'buyPrice',
            'MSRP',
        ]));

        return response()->json("Product created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::where("productCode", $id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::where("productCode", $id)->first()->update($request->only([
            'productCode',
            'productName',
            'productLine',
            'productScale',
            'productVendor',
            'productDescription',
            'quantityInStock',
            'buyPrice',
            'MSRP',
        ]));

        return response()->json("Product updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where("productCode", $id)->first()->delete();

        return response()->json("Product deleted");
    }
}
