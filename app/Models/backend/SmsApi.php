<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsApi extends Model
{
    protected $fillable = ['senderId', 'bearerToken'];

    use HasFactory;
}
