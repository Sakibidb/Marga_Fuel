<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Adjustment;
use App\Models\backend\ProductModel;
use App\Models\backend\Warehouse;

class AdjustmentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'quantity', 'reason', 'date', 'adjusted_by',
    'adjustment_id', 'adjustment_price', 'received_quantity', 'total_amount',
    ];

    public function adjustment()
    {
        return $this->belongsTo(Adjustment::class, 'adjustment_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
