<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\WebsiteOrder;

class Delivery extends Model
{
    protected $fillable = ['customer_id', 'customer', 'warehouse', 'vehicle', 'delivery_date','order_id'];
    use HasFactory;

    public function orderid()
    {
        return $this->belongsTo(WebsiteOrder::class, 'order_id');
    }
}
