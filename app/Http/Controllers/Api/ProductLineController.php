<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductLine\IndexRequest;
use App\Http\Requests\ProductLine\ShowRequest;
use App\Http\Requests\ProductLine\StoreRequest;
use App\Http\Requests\ProductLine\UpdateRequest;
use App\Models\ProductLine;
use App\Utility\Responser;
use Illuminate\Http\Request;

class ProductLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        /* Request-də validasiya edilmis deyerleri gotururuk */
//         $validatedData = $request->validated();

        $statement = ProductLine::query();
        if ($request->has('productLine')) {
            $request->where('productLine', $request->get('productLine'));
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
        ProductLine::create(
            $request->validated()
        );

        return Responser::json(message: "Product Line Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
        return Responser::json(
            data: ProductLine::where("productLine", $id)->firstOrFail()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        ProductLine::where("productLine", $id)
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
        ProductLine::findOrFail($id)
            ->delete();

        return Responser::json();
    }
}
