<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Office\IndexRequest;
use App\Http\Requests\Office\ShowRequest;
use App\Http\Requests\Office\StoreRequest;
use App\Http\Requests\Office\UpdateRequest;
use App\Models\Office;
use App\Utility\Responser;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        return Responser::json(
            Office::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Office::create(
            $request->validated()
        );

        return Responser::json(message: "Office created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, $id)
    {
        return Responser::json(
            data: Office::where("officeCode", $id)->firstOrFail()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        Office::where("officeCode", $id)
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
        Office::findOrFail($id)
            ->delete();
        return Responser::json(status: 204);
    }
}
