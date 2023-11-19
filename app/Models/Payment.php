<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'name',
        'email',
        'phone',
        // 'address',
        // 'city',
        // 'country',
        // 'zip_code',
        'payment_method',
        'payment_id',
        'currency',
        'amount',
        'transaction_id',
        'status',
    ];
}
