<?php

namespace App\Models\Backend;

use App\Models\backend\ProductModel;
use Illuminate\Database\Eloquent\Model;

class DeliveryItem extends Model
{
    protected $fillable = ['delivery_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
}