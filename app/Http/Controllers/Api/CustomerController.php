<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\IndexRequest;
use App\Http\Requests\Customer\ShowRequest;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\Customer;
use App\Utility\Responser;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        return Responser::json(
            Customer::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
       Customer::create(
            $request->validated()
        );

       return Responser::json( message: "men oz mesajimi yazdim");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
       return Responser::json(
           data:Customer::where("customerNumber",$id)->firstOrFail()
       );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {

//        Customer::where("customerNumber",$id)->first()->update($request->only([
//            'customerName',
//            'contactLastName',
//            'contactFirstName',
//            'phone',
//            'addressLine1',
//            'addressLine2',
//            'city',
//            'state',
//            'postalCode',
//            'country',
//            'salesRepEmployeeNumber',
//            'creditLimit',
//        ]));

        Customer::where("customerNumber",$id)
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
        Customer::findOrFail($id)
            ->delete();

        return Responser::json(status: 204);
    }
}
