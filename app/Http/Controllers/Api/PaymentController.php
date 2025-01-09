<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\IndexRequest;
use App\Http\Requests\Payment\ShowRequest;
use App\Http\Requests\Payment\StoreRequest;
use App\Http\Requests\Payment\UpdateRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $payments = Payment::all();

        return response()->json($payments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Payment::create($request->only([
            'checkNumber',
            'paymentDate',
            'amount',
            'customerNumber',
        ]));

        response()->json("Payment created");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
        return Payment::where('checkNumber', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Payment::where('checkNumber', $id)->update($request->only([
            'paymentDate',
            'amount',
            'customerNumber',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::where('checkNumber', $id)->first()->delete();

        return response()->json("Payment deleted");
    }
}
