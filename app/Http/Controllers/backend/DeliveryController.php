<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Customer;
use App\Models\backend\Delivery;
use App\Models\backend\Driver;
use App\Models\backend\VehicleAssign;
use App\Models\backend\Warehouse;
use App\Models\backend\WebsiteOrder;
use App\Models\backend\StockSummary;
use App\Models\backend\ProductModel;
use App\Models\backend\Stock;
use Illuminate\Http\Request;


class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = WebsiteOrder::all();
        return view('backend.page.deliveries.index', compact('deliveries'));
    }

    public function create(Request $request)
    {
        // return $request->all();
    $warehouses = Warehouse::all();
    $vehicles = VehicleAssign::all();
    $customer = $request->query('customer');
    $id = $request->query('id');
    $delivery = Delivery::first();
    // $order =WebsiteOrder::find($id);

    return view('backend.page.deliveries.create',['customer' => $customer, 'id' => $id], compact('warehouses','vehicles', 'delivery',));
    }

    public function store(Request $request)
    {

        WebsiteOrder::create([
            'warehouse_id' => $request->warehouse,
            // 'vehicle' => $request->vehicle,
            'delivery_date' => $request->delivery_date,
        ]);
        // dd($request);

        return redirect()->route('delivery.index')->with('success', 'Delivery created successfully');
    }

    public function edit($id)
    {
        $warehouses = Warehouse::all();
        $vehicles = VehicleAssign::whereHas('vehicle', function($query) {
            $query->where('is_free', 1);
        })->get();
        $order = WebsiteOrder::find($id);
        return view('backend.page.deliveries.edit', compact('warehouses','vehicles', 'order',));
    }


    public function update(Request $request, $id)
    {

        // update order

        $order=WebsiteOrder::find($id);
        $order->update([
            'warehouse_id' => $request->warehouse,
            'vehicle_assign_id' => $request->vehicle,
            'delivery_date' => $request->delivery_date,
            'current_status' => 'On the way',
        ]);

        if ($order->vehicleAssign && $order->vehicleAssign->vehicle) {
            $vehicle = $order->vehicleAssign->vehicle;
            $vehicle->update([
                'is_free' => 0,
            ]);
        }


        Stock::create([
            'warehouse_id' => $request->warehouse,
            'product_id' => $order->product_id,
            'date' => $request->delivery_date,
            'quantity' => $order->quantity,
            'sale_price' => $order->totalAmount,
            'stock_type' => 'Out',
            'stockable_type' => 'Order',
            'stockable_id' => $order->id,
        ]);

        // create Stock Summary

        StockSummary::create([
            'stock_out_qty' => $order->quantity,
            'stock_in_value' => $order->totalAmount,
            'product_id' => $order->product_id,
            'warehouse_id' => $request->warehouse,
            'vehicle_assign_id' => $request->vehicle,
        ]);

        // Update Product stock
        $product = ProductModel::find($order->product_id);
        if ($product) {
            $stock = (int) $product->stock;
            $newStock = $stock - $order->quantity;
            $product->stock = $newStock;
            $product->save();
        }

        return redirect()->route('delivery.index')->with('success', 'Delivery updated successfully');
    }

    public function show($id)
    {
        // Logic to retrieve and display the delivery resource with the given $id
    }

    public function destroy($id)
    {
        $delivery = Delivery::find($id);
        $delivery->delete();
        return redirect()->route('delivery.index')->with('success', 'Delivery deleted successfully');
    }
}
