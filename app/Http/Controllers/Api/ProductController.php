<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Utility\Responser;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $request->validated();

        $statement = Product::query();
        if ($request->has('productCode')) {
            $request->where('productCode', $request->get('productCode'));
        }

        return Responser::json(
          $statement->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Product::create(
            $request->validated()
        );

        return Responser::json(message: "Product created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
        return Responser::json(
          data: Product::where("productCode", $id)->firstorFail()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Product::where("productCode", $id)
            ->firstOrFail()->update(
            $request->validated()
        );

        return Responser::json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)
            ->delete();

        return Responser::json(status: 204);
    }
}
