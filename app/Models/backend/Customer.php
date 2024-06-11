<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'email', 'address', 'shipping_address', 'country',
    ];
    

    public function countryss()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
