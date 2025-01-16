<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\IndexRequest;
use App\Http\Requests\Order\ShowRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Http\Resources\OrderCollectionResource;
use App\Models\Office;
use App\Models\Order;
use App\Utility\Responser;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $request->validated();

        $statement = Order::query();

        if($request->has('orderNumber')){
            $statement->where('orderNumber',$request->get('orderNumber'));
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
        Order::create(
            $request->validated()
        );

        return Responser::json(message: "Order created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
        $order = Order::with([
            'customer',
            'orderDetails.products.productLine'
        ])->where('orderNumber', $id)->firstOrFail();

        return Responser::json(
            data:new OrderCollectionResource($order)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Office::where("orderNumber", $id)
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
        Order::findOrFail($id)
            ->delete();

        return Responser::json(status: 204);
    }
}
