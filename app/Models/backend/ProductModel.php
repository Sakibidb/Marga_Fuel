<?php

namespace App\Models\backend;

use App\Models\backend\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bn_name',
        'price',
        'bn_price',
        'image',
        'stock',

    ];


    public function categorydi()
    {
        return $this->belongsTo(CategoryModel::class, 'category' , 'id');
    }


      /*
     |--------------------------------------------------------------------------
     | STOCKS (MORPH RELATION)
     |--------------------------------------------------------------------------
    */
    public function stocks()
    {
        return $this->morphMany(Stock::class, 'stockable');
    }


    /*
     |--------------------------------------------------------------------------
     | PRODUCT STOCKS (RELATION)
     |--------------------------------------------------------------------------
    */
    public function productStocks()
    {
        return $this->hasMany(Stock::class);
    }

}
