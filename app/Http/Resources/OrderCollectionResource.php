<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return[
//            'orderNumber'=>$this->resource->resource['orderNumber'],
//            'orderDate'=>$this->resource->resource['orderDate'],
//            'requiredDate'=>$this->resource->resource['requiredDate'],
//            'shippedDate'=>$this->resource->resource['shippedDate'],
//            'status'=>$this->resource->resource['status'],
//            'comments'=>$this->resource->resource['comments'],
//        ];
        return [
            'orderNumber' => $this->resource->orderNumber,
            'orderDate' => $this->resource->orderDate,
            'requiredDate' => $this->resource->requiredDate,
            'shippedDate' => $this->resource->shippedDate,
            'status' => $this->resource->status,
            'comments' => $this->resource->comments,
            'customerNumber' => $this->resource->customerNumber,
            'customer_id' => $this->resource->customer_id,
            'customerName' => $this->resource->customer->customerName,
            'contactLastName' => $this->resource->customer->contactLastName,
            'contactFirstName' => $this->resource->customer->contactFirstName,
            'phone' => $this->resource->customer->phone,
            'addressLine1' => $this->resource->customer->addressLine1,
            'addressLine2' => $this->resource->customer->addressLine2,
            'city' => $this->resource->customer->city,
            'state' => $this->resource->customer->state,
            'postalCode' => $this->resource->customer->postalCode,
            'country' => $this->resource->customer->country,
            'salesRepEmployeeNumber' => $this->resource->customer->salesRepEmployeeNumber,
            'creditLimit' => $this->resource->customer->creditLimit,
          //  'orderDetails'=>$this->resource->orderDetails,
           'orderDetails'=>OrderDetailResource::collection($this->resource->orderDetails),
        ];
    }

}
