<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Product;
use App\Models\backend\Supplier;
use App\Models\backend\Warehouse;
use App\Models\backend\VehicleAssign;
use App\Models\backend\WebsiteOrder;

class StockSummary extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'stock_summaries';


    public function websiteOrder()
    {
        return $this->belongsTo(WebsiteOrder::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function vehicleAssign()
    {
        return $this->belongsTo(VehicleAssign::class, 'vehicle_assign_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
