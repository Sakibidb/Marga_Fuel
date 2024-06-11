<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Warehouse;
use App\Models\backend\Supplier;
use App\Models\backend\Stock;
use App\Models\backend\ProductModel;


class ItemledgerController extends Controller
{

    public function index()
    {
        $warehouses=Warehouse::all();
        $suppiiers=Supplier::all();
        $stocks=Stock::all();
        $products=ProductModel::all();
        return view('backend.page.stock.item_ledger.index', compact('warehouses','suppiiers','stocks','products'));
    }


    public function showItemLedger(Request $request)
    {
        // Fetch necessary data
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();

        // Fetch stocks based on search query
        $query = Stock::query()->with(['product', 'warehouse', 'supplier']);

        if ($request->filled('p_name')) {
            $query->whereHas('product', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->p_name . '%');
            });
        }

        if ($request->filled('warehouse_id')) {
            $query->where('warehouse_id', $request->warehouse_id);
        }

        if ($request->filled('supplier_id')) {
            $query->where('supplier_id', $request->supplier_id);
        }

        // Filter by date range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
            $query->whereDate('date', '>=', $fromDate)->whereDate('date', '<=', $toDate);
        }

        // Fetch filtered stocks
        $stocks = $query->get();

        return view('backend.page.stock.item_ledger.index', compact('warehouses', 'suppliers', 'stocks'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
