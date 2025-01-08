<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_details = OrderDetail::all();

        return response()->json($order_details);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OrderDetail::create($request->only([
            'orderNumber',
            'productCode',
            'quantityOrdered',
            'priceEach',
            'orderLineNumber',
        ]));

        return response()->json("OrderDetails stored successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return OrderDetail::where('orderNumber', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        OrderDetail::where('orderNumber', $id)->first->update($request->only([
            'orderNumber',
            'productCode',
            'quantityOrdered',
            'priceEach',
            'orderLineNumber',
        ]));

        return response()->json("OrderDetail updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OrderDetail::where('orderNumber', $id)->first()->delete();
        return response()->json("OrderDetail deleted successfully");
    }
}
