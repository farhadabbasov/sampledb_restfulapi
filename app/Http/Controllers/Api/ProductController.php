<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
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
    public function show(ShowRequest $request, $id)
    {
        return Product::where("productCode", $id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Product::where("productCode", $id)->first()->update($request->only([
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
