<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices = Office::all();

        return response()->json($offices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Office::create($request->only([
            'officeCode',
            'city',
            'phone',
            'addressLine1',
            'addressLine2',
            'state',
            'country',
            'postalCode',
            'territory',
        ]));

        return response()->json("Offices stored successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Office::where("officeCode", $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Office::where("officeCode", $id)->first()->update($request->only([
            'officeCode',
            'city',
            'phone',
            'addressLine1',
            'addressLine2',
            'state',
            'country',
            'postalCode',
            'territory',
        ]));

        return response()->json("Offices updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Office::where("officeCode", $id)->first()->delete();
        return response()->json("Office deleted successfully");
    }
}
