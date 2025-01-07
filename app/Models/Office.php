<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $primaryKey = 'officeCode';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = [
        'officeCode',
        'city',
        'phone',
        'addressLine1',
        'addressLine2',
        'state',
        'country',
        'postalCode',
        'territory',
    ];

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employee::class, 'officeCode', 'officeCode');
    }
}
