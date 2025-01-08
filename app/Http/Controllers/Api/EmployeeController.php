<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\IndexRequest;
use App\Http\Requests\Employee\StoreRequest;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $employees = Employee::all();

        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Employee::create($request->only([
            'employeeNumber',
            'lastName',
            'firstName',
            'extension',
            'email',
            'officeCode',
            'reportsTo',
            'jobTitle',
        ]));

        return response()->json("Employee stored successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       /* $customers = new Customer();
          $customers->orders(); */

        return Employee::where("employeeNumber", $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Employee::where("employeeNumber", $id)->first()->update($request->only([
            'employeeNumber',
            'lastName',
            'firstName',
            'extension',
            'email',
            'officeCode',
            'reportsTo',
            'jobTitle',
        ]));

        return response()->json("Employee updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Employee::where("employeeNumber", $id)->first()->delete();
        return response()->json("Employee deleted");
    }
}
