<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id', 'date', 'invoice_no', 'qty_total', 'qty_amount', 'discount_amount',
        'total_amount', 'previous_due', 'payable_amount', 'paid_amount', 'due_amount', 'company_id',
        'warehouse_id', 'product_id',
    ];
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }

    
}