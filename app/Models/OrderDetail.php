<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
//    protected $primaryKey = '';
//    public $incrementing = false;
    protected $fillable = [
        'orderNumber',
        'productCode',
        'quantityOrdered',
        'priceEach',
        'orderLineNumber',
    ];

    protected $table ='orderdetails';

    public function orders()
    {
        return $this->belongsTo(Order::class, 'orderNumber', 'orderNumber');
    }


    public function products()
    {
        return $this->belongsTo(Product::class, 'productCode', 'productCode');
    }
}
