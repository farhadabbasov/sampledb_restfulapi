<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Data3RetrieveController extends Controller
{
    public function index()
    {
        $response = Http::get('https://dummyjson.com/users');

        if ($response->successful()) {

            $data = $response->json();

            return response()->json(Data2RetrieveResource::collection($data['users']), 200);
        }

        return response()->json(['error'=>'Failed to fetch data'], 500);
    }
}
