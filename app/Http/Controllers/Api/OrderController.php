<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\IndexRequest;
use App\Http\Requests\Order\ShowRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Office;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Order::create($request->only([
            'orderNumber',
            'orderDate',
            'requiredDate',
            'shippedDate',
            'status',
            'comments',
            'customerNumber',
        ]));

        return response()->json("Orders stored successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
        return Office::where('orderNumber', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Office::where('orderNumber', $id)->first()->update($request->only([
            'orderDate',
            'requiredDate',
            'shippedDate',
            'status',
            'comments',
            'customerNumber',
        ]));

        return response()->json("Orders updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Office::where('orderNumber', $id)->first()->delete();
        return response()->json("Orders deleted successfully");
    }
}
