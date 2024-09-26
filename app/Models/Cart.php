<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'product_id',
        'user_id',
        'total_quantity',
    ];
}
