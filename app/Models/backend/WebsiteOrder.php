<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Product;
use App\Models\User;
use App\Models\backend\Warehouse;
use App\Models\backend\Driver;
use App\Models\backend\OrderStatus;
use App\Models\backend\VehicleAssign;
use App\Models\backend\StockSummary;

class WebsiteOrder extends Model
{
    protected $fillable = ['customer', 'address', 'location', 'totalAmount', 'quantity', 'productName', 'vehicle', 'paymentMethod',
    'website_orders', 'warehouse_id', 'customer_id','delivery_man_id', 'current_status', 'product_id',
    'delivery_date', 'date', 'order_source', 'payment_method', 'payment_status', 'coupon_discount_amount',
    'paid_amount','due_amount','vehicle_assign_id', 'driver_status',
];
    use HasFactory;


    public function stockSummaries()
    {
        return $this->hasMany(StockSummary::class);
    }


    public function vehicleAssign()
    {
        return $this->belongsTo(VehicleAssign::class, 'vehicle_assign_id');
    }

    public function customerInfo()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'delivery_man_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'current_status');
    }
}
