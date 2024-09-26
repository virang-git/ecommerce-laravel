<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'product_price',
        'product_quantity',
        'category_id',
    ];

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
