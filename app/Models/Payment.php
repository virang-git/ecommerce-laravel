<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';

    // Define the primary key of the table
    protected $primaryKey = 'payment_id';

    // Specify if the primary key is non-incrementing or non-numeric
    public $incrementing = true;

    // Specify the data type of the primary key
    protected $keyType = 'bigint';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'order_id',
        'user_id',
        'payment_mode',
        'payment_date',
    ];

    // Disable timestamps if the table does not have `created_at` and `updated_at`
    public $timestamps = false;

    // Cast attributes to their appropriate data types
    protected $casts = [
        'payment_date' => 'datetime',
    ];
}
