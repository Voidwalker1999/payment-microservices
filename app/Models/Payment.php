<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'payment_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'zip_code',
        'country',
        'payment_method',
        'currency',
        'amount',
        'status',
        'payment_date',
        'user_id',
        'reference_id',
        'card_id',
        'transaction_id',
    ];
}
