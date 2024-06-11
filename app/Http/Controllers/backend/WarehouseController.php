<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('backend.page.warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        return view('backend.page.warehouses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer|min:0',
        ]);

        Warehouse::create($request->all());
        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully');
    }

    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('backend.page.warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer|min:0',
        ]);

        $warehouse = Warehouse::find($id);
        $warehouse->update($request->all());
        return redirect()->route('warehouses.index')->with('success', 'Warehouse updated successfully');
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('success', 'Warehouse deleted successfully');
    }

    public function warehouseApi()
    {
        $warehouse = Warehouse::all();

        if ($warehouse->isEmpty()) {
            return response()->json([
                'data' => null,
                'message' => "No warehouse records found",
                'status' => false,
            ], 404);
        } else {
            return response()->json([
                'data' => $warehouse,
                'message' => "Success",
                'status' => true,
            ], 200);
        }

        // return response()->json(['warehouse' => $warehouse]);
    }
}
