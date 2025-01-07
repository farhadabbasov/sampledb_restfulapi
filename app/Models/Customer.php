<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customerNumber';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
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
    ];

    public function employees(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }


    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany

    {
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber');
    }


    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class, 'customerNumber', 'customerNumber');
    }
}
