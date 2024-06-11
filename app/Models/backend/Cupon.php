<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = [
        'name','sdate', 'edate', 'use', 'code', 'dis_type', 'amount', 'description'

    ];
    use HasFactory;
}
