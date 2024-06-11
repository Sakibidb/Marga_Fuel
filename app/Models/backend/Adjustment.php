<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\ProductModel;
use App\Models\backend\Warehouse;

class Adjustment extends Model
{
    use HasFactory;

    protected $fillable = [
       'quantity','warehouse_id', 'total_amount',
    ];

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}

