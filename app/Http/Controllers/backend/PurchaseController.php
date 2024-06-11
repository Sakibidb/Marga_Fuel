<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Supplier;
use App\Models\backend\ProductModel;
use App\Models\backend\Warehouse;
use App\Models\backend\Purchase;
use App\Models\backend\StockSummary;
use App\Models\backend\PurchaseDetails;
use App\Models\backend\Stock;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'warehouse', 'product'])->paginate(10);
        return view('backend.page.purchase.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $products = ProductModel::all();
        return view('backend.page.purchase.create', compact('suppliers', 'warehouses', 'products'));
    }



    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Purchase Table Create
            $purchase = Purchase::create([
                'supplier_id' => $request->supplier_id,
                'warehouse_id' => $request->warehouse_id,
                'qty_total' => $request->total_quantity,
                'date' => $request->date,
                'total_amount' => $request->payable_amount,
            ]);

            // Loop through the product details and create PurchaseDetails entries
            foreach ($request->product_id as $index => $productId) {
                PurchaseDetails::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $productId,
                    'purchase_price' => $request->unit_cost[$index],
                    'quantity' => $request->quantity[$index],
                ]);
                // dd($request->date);


                // Update product stock for each product
                $product = ProductModel::find($productId);
                if ($product) {
                    // Cast the values to integer to ensure numeric addition
                    $product->stock = (int)$product->stock + (int)$request->quantity[$index];
                    $product->save();
                }
            }

            // Stock Table


            // foreach ($request->product_id as $index => $productId) {
            //     // Debug before creating stock


            // }

            // Update the stock summary table (if needed for each product)
            foreach ($request->product_id as $index => $productId) {

                Stock::create([
                    'supplier_id' => $request->supplier_id,
                    'warehouse_id' => $request->warehouse_id,
                    'product_id' => $productId,
                    'date' => $request->date,
                    'quantity' => $request->quantity[$index],
                    'purchase_price' => $request->unit_cost[$index],
                    'stock_type' => 'In',
                    'stockable_type' => 'Direct Purchase',
                    'stockable_id' => $purchase->id,
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

            return redirect()->route('purchase.index')->with('success', 'New purchase created successfully');
        } catch (\Exception $e) {
            dd( $e);
            DB::rollBack();
            return redirect()->route('purchase.index')->with('error', 'Failed to create purchase: ' . $e->getMessage());
        }
    }










    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $products = ProductModel::all();
        return view('backend.page.purchase.edit', compact('purchase', 'suppliers', 'warehouses', 'products'));
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->update([
            'supplier_id' => $request->supplier_id,
            'warehouse_id' => $request->warehouse_id,
            'product_id' => $request->product_id,
            'qty_total' => $request->total_quantity,
            'date' => $request->date,
            'total_amount' => $request->payable_amount,
        ]);

        return redirect()->route('purchase.index')->with('success', 'Purchase updated successfully');
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('purchase.index')->with('success', 'Purchase deleted successfully');
    }
}
