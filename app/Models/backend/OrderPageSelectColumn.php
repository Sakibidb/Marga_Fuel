<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPageSelectColumn extends Model
{
    protected $fillable = [
        'category_en','category_bn',
    ];
    use HasFactory;
}
