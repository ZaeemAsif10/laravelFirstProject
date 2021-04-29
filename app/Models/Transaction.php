<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'trans_type',
        'bank_id',
        'branch_id',
        'party_id',
        'cheq_no',
        'amount',
        'des',
    ];
}
