<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderDetail\IndexRequest;
use App\Http\Requests\OrderDetail\ShowRequest;
use App\Http\Requests\OrderDetail\StoreRequest;
use App\Http\Requests\OrderDetail\UpdateRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utility\Responser;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        return Responser::json(
            OrderDetail::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        OrderDetail::create(
            $request->validated()
        );

        return Responser::json(message: "OrderDetail created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
       return Responser::json(
           data: OrderDetail::where('orderNumber', $id)->firstOrFail(),
       );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        OrderDetail::where('orderNumber', $id)
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
        OrderDetail::findOrFail($id)
            ->delete();

        return Responser::json(status: 204);
    }
}
