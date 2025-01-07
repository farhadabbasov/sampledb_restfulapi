<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    protected $primaryKey = 'employeeNumber';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'employeeNumber',
        'lastName',
        'firstName',
        'extension',
        'email',
        'officeCode',
        'reportsTo',
        'jobTitle',
    ];


    public function office(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Office::class, 'officeCode', 'officeCode');
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class, 'reportsTo', 'employeeNumber');
    }

    public function customers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Customer::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }


}
