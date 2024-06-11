<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Supplier;
use App\Models\backend\ProductModel;
use App\Models\backend\Warehouse;
use App\Models\backend\Adjustment;
use App\Models\backend\StockSummary;
use App\Models\backend\AdjustmentDetail;
use App\Models\backend\Stock;
use Illuminate\Support\Facades\DB;


class AdjustmentController extends Controller
{

    public function index()
    {
        $adjustments = Adjustment::all();
        return view('backend.page.stock.adjustments.index', compact('adjustments'));
    }

    public function create()
    {
        $suppliers=Supplier::all();
        $warehouses=Warehouse::all();
        $products = ProductModel::all();
        return view('backend.page.stock.adjustments.create', compact('products', 'suppliers', 'warehouses'));
    }




    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Purchase Table Create
            $adjustment = Adjustment::create([
                'warehouse_id' => $request->warehouse_id,
                'quantity' => $request->total_quantity,
                // 'date' => $request->date,
                'total_amount' => $request->payable_amount,
            ]);

            // Loop through the product details and create PurchaseDetails entries
            foreach ($request->product_id as $index => $productId) {
                AdjustmentDetail::create([
                    'adjustment_id' => $adjustment->id,
                    'product_id' => $productId,
                    'adjustment_price' => $request->unit_cost[$index],
                    'quantity' => $request->quantity[$index],
                ]);
                // dd($request->date);


                // Update product stock for each product
                $product = ProductModel::find($productId);
                if ($product) {
                    $product->stock = $product->stock + $request->quantity[$index];
                    $product->save();
                }
            }

            foreach ($request->product_id as $index => $productId) {

                Stock::create([
                    'supplier_id' => $request->supplier_id,
                    'warehouse_id' => $request->warehouse_id,
                    'product_id' => $productId,
                    'date' => $request->date,
                    'quantity' => $request->quantity[$index],
                    'purchase_price' => $request->unit_cost[$index],
                    'stock_type' => 'In',
                    'stockable_type' => 'Adjustment',
                    'stockable_id' => $adjustment->id,
                ]);
                StockSummary::create([
                    'supplier_id' => $request->supplier_id,
                    'warehouse_id' => $request->warehouse_id,
                    'product_id' => $productId,
                    'stock_in_qty' => $request->quantity[$index],
                    'stock_out_value' => $request->unit_cost[$index] * $request->quantity[$index],
                    // 'date' => $request->date,
                ]);
            }

            DB::commit();

            return redirect()->route('adjustment.index')->with('success', 'New purchase created successfully');
        } catch (\Exception $e) {
            dd( $e);
            DB::rollBack();
            return redirect()->route('adjustment.index')->with('error', 'Failed to create purchase: ' . $e->getMessage());
        }
    }




    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
