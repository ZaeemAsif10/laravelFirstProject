<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;
    protected $table = 'carriers';
    protected $fillable = [
        'airline_id',
        'passenger_id',
        'airline_code',
        'pnr',
        'airport_code',
        'type',
        'purchase',
        'sale',
        'date',
    ];
}
