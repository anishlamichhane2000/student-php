<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;


    
class Child extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'age', 'gender',
        'different_address', 'child_address', 'child_city',
        'child_state', 'country', 'child_zip_code',
    ];
    
    public static $rules = [
        'first_name' => 'required|string',
        'middle_name' => 'nullable|string',
        'last_name' => 'required|string',
        'age' => 'required|integer',
        'gender' => 'required|string',
        'different_address' => 'boolean',
        'child_address' => 'nullable|string',
        'child_city' => 'nullable|string',
        'child_state' => 'nullable|string',
        'country' => 'nullable|string',
        'child_zip_code' => 'nullable|string',
    ];
    
}

