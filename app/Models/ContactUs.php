<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact';
    public $timestamps = false;
    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_mobileno',
        'contact_address',
        'purpose'
    ];
}
