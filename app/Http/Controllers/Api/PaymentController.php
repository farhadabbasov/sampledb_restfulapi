<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\IndexRequest;
use App\Http\Requests\Payment\ShowRequest;
use App\Http\Requests\Payment\StoreRequest;
use App\Http\Requests\Payment\UpdateRequest;
use App\Models\Payment;
use App\Utility\Responser;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
       return Responser::json(
           Payment::all()
       );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Payment::create(
            $request->validated()
        );

        return Responser::json(message: "Payment created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
        return Responser::json(
            data: Payment::where("checkNumber", $id)->firstOrFail()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Payment::where('checkNumber', $id)
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
        Payment::findOrFail($id)
            ->delete();

        return Responser::json(status: 204);
    }
}
