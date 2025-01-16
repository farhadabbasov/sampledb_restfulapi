<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\IndexRequest;
use App\Http\Requests\Employee\ShowRequest;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Customer;
use App\Models\Employee;
use App\Utility\Responser;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $requestedData = $request->validated();
//        $statement = Employee::when(!empty($requestedData['lastName']), function ($query) use ($requestedData) {
//            $query->where('lastName',$
//requestedData['lastName']);
//        })
//        ->when(!empty($requestedData['firstName']), function ($query) use ($requestedData) {
//            $query->where('firstName',$requestedData['firstName']);
//        })
//            ->when(!empty($requestedData['employeeNumber']), function ($query) use ($requestedData) {
//                $query->where('employeeNumber',$requestedData['employeeNumber']);
//            })->get();

        $statement = Employee::query();

        if($request->has("firstName")){

            $statement->where("firstname",$request->get('firstName'));
        }

        /*
         *
         * 1-ci stepde select * from employeers
         *
         * 2-ci select firstname from employeers where firstname = 'Mary'
         *
         * 3-cu  select * from employeers where firstname = 'Mary' and lastname = "lastname"
         *
         */

        return Responser::json(
            $statement->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Employee::create(
            $request->validated()
        );

        return Responser::json(message: "Employee created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
       /* $customers = new Customer();
          $customers->orders(); */

        return Responser::json(
            data: Customer::where("employeeNumber", $id)->firstOrFail()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Employee::where("employeeNumber", $id)
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
        Employee::findOrFail($id)
            ->delete();

        return Responser::json(status: 204);
    }
}
