<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'payment_name',
        'payment_method',
        'amount',
        'dt'
    ];
}
