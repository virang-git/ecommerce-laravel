<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'order';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'cart_id',
        'user_id',
        'total_amount',
        'order_date'
    ];
}
