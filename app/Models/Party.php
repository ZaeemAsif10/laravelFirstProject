<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $table = 'parties';
    protected $fillable = [
        'party_name',
        'description',
    ];
}
