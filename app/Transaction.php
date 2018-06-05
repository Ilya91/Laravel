<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];
}
