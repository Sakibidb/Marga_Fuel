<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Purchase;
use App\Models\backend\ProductModel;


class PurchaseDetails extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = 'purchase_details';


    // public function purchase()
    // {
    //     return $this->belongsTo(Purchase::class);
    // }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
}
