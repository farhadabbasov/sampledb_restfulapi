<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataRetrieveResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataRetrieveController extends Controller
{
    public function index()
    {
        $response = Http::get('https://dummyjson.com/products');


        if ($response->successful()) {

            $data = $response->json();
            // STEP 1
//            $data['data'] = $data['products'];
//            unset($data['products']);
//
//            unset($data['total']);
//            unset($data['skip']);
//            unset($data['limit']);
//
//
//            $data['data'] = array_map(function($item) {
//                return [
//                    'id' => $item['id'],
//                    'title' => $item['title'],
//                    'description' => $item['description'],
//                ];
//            }, $data['data']);
//
//            return response()->json($data);

            # approach 2
//
//            $response = ['data'=>null];
//
//            foreach ($data['products'] as $product) {
//                $response['data'][] = [
//                    'id'=>$product['id'],
//                    'title'=>$product['title'],
//                    'description'=>$product['description']
//                ];
//            }
//
//            return response()->json($response, 200);

            # Approach 3

            return response()->json(DataRetrieveResource::collection($data['products']), 200);
        }


        return response()->json(['error' => 'Failed to fetch data'], 500);
    }
}
