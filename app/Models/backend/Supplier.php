<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $fillable =['name' ,'email', 'mobile','address', 'opening_balance', 'current_balance',
                        'previous_due',];
    use HasFactory;
}
