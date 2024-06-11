<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\ProductModel;
use App\Models\backend\WebsiteOrder;
use App\Models\backend\Purchase;
use App\Models\backend\Adjustment;
use App\Models\backend\Supplier;
use App\Models\backend\Warehouse;
use Illuminate\Database\Eloquent\Relations\Relation;


class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    protected $fillable = [
        'supplier_id', 'warehouse_id', 'product_id', 'date',
        'quantity', 'purchase_price', 'purchase_total', 'subtotal',
        'stock_type', 'stockable_type', 'stockable_id','sale_price', 'actual_quantity',
    ];

    // public function boot()
    // {
    // Relation::morphMap([
    //     'Product Opening By Product' => Product::class,
    //     'Direct Purchase' => Purchase::class,
    //     'Order' => WebsiteOrder::class,
    //     // Add other mappings if necessary
    // ]);
    // }

    //   /*
    //  |--------------------------------------------------------------------------
    //  | STOCKABLE IN TYPES (SCOPE)
    //  |--------------------------------------------------------------------------
    // */
    // public function scopeStockableInTypes($query)
    // {
    //     $query->where(function ($q) {
    //         $q->where('stockable_type', 'Product Opening By Product')
    //         ->orWhere('stockable_type', 'Direct Purchase');
    //     });
    // }

    // /*
    //  |--------------------------------------------------------------------------
    //  | STOCKABLE OUT TYPES (SCOPE)
    //  |--------------------------------------------------------------------------
    // */
    // public function scopeStockableOutTypes($query)
    // {
    //     $query->where(function ($q) {
    //         $q->where('stockable_type', 'Order');
    //     });
    // }

     /*
     |--------------------------------------------------------------------------
     | Purchase (RELATION)
     |--------------------------------------------------------------------------
    */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'stockable_id');
    }

    /*
     |--------------------------------------------------------------------------
     | WAREHOUSE (RELATION)
     |--------------------------------------------------------------------------
    */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    /*
     |--------------------------------------------------------------------------
     | PRODUCT (RELATION)
     |--------------------------------------------------------------------------
    */
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id'); // Correct reference
    }

    /*
     |--------------------------------------------------------------------------
     | SUPPLIER (RELATION)
     |--------------------------------------------------------------------------
    */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
