<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Driver;
use App\Models\backend\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('backend.page.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $drivers = Driver::all();
        return view('backend.page.vehicles.create', compact('drivers'));
    }

    public function store(Request $request)
    {
        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully');
    }

    public function edit(Vehicle $vehicle)
    {
        $drivers = Driver::all();
        return view('backend.page.vehicles.edit', compact('vehicle', 'drivers'));
    }


    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }

    public function vehiclesApi()
    {
        $vehicles = Vehicle::all();

        if ($vehicles->isEmpty()) {
            return response()->json([
                'data' => null,
                'message' => "No vehicles records found",
                'status' => false,
            ], 404);
        } else {
            return response()->json([
                'data' => $vehicles,
                'message' => "Success",
                'status' => true,
            ], 200);
        }

        // return response()->json(['vehicles' => $vehicles]);
    }
}
