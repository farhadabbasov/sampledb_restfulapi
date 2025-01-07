<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create($request->only([
            'customerNumber',
            'customerName',
            'contactLastName',
            'contactFirstName',
            'phone',
            'addressLine1',
            'addressLine2',
            'city',
            'state',
            'postalCode',
            'country',
            'salesRepEmployeeNumber',
            'creditLimit',
        ]));

        return response()->json("Customer store");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return Customer::where("customerNumber",$id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Customer::where("customerNumber",$id)->first()->update($request->only([
            'customerNumber',
            'customerName',
            'contactLastName',
            'contactFirstName',
            'phone',
            'addressLine1',
            'addressLine2',
            'city',
            'state',
            'postalCode',
            'country',
            'salesRepEmployeeNumber',
            'creditLimit',
        ]));

        return response()->json("Customer update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("salam");
        Customer::where("customerNumber",$id)->first()->delete();

        return response()->json("Customer destroy");
    }
}
