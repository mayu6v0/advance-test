<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];

    public static $rules = array(
        'firstname' => 'required',
        'lastname' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => 'required|regex:/^\d{3}-\d{4}$/',
        'address' => 'required',
        'building_name' => 'nullable',
        'opinion' => 'required|max:120'
    );
}
