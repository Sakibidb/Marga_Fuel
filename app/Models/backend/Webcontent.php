<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webcontent extends Model
{
    protected $fillable = ['scrolling', 'text', 'footer', 'cardup', 'bangla_scrolling',
    'bangla_text', 'bangla_footer', 'bangla_cardup',
   ];
    use HasFactory;
}
