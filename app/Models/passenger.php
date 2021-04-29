<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passenger extends Model
{
    use HasFactory;
    protected $table = 'passengers';
    protected $fillable = [
        'passenger_name',
        'father_name',
        'gender',
        'dob',
        'pass_no',
        'cnic_no',
        'pass_issue_date',
        'pass_expiry_date',
        'phone_no',
        'address',
    ];
}
