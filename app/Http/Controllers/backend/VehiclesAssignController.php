<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Shift;
use App\Models\backend\Vehicle;
use App\Models\backend\VehicleAssign;
use App\Models\User;

class VehiclesAssignController extends Controller
{
    public function index()
    {
        $assigns = VehicleAssign::with('user')->get();
        return view('backend.page.vehiclesassign.index', compact('assigns'));
    }

    public function create()
    {
        $drivers = User::where('role', 3)->get(['id', 'name', 'mobile']);
        $shifts = Shift::all();
        $vehicles = Vehicle::all();
        return view('backend.page.vehiclesassign.create', compact('shifts', 'drivers', 'vehicles'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'vehicleno' => 'required|exists:vehicles,id',
            'drivername' => 'required|exists:users,id',
            'shift' => 'required|exists:shifts,id',
            'capacity' => 'required|numeric',
        ]);

        VehicleAssign::create([
            'vehicle_id' => $request->vehicleno,
            'user_id' => $request->drivername,
            'shift_id' => $request->shift,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('vassign.index')->with('success', 'Vehicle assignment created successfully');
    }

    public function edit($id)
    {
        $assign = VehicleAssign::find($id);
        if (!$assign) {
            return redirect()->route('vassign.index')->with('error', 'Vehicle assignment not found');
        }

        $drivers = User::where('role', 3)->get(['id', 'name', 'mobile']);
        $shifts = Shift::all();
        $vehicles = Vehicle::all();

        return view('backend.page.vehiclesassign.edit', compact('assign', 'vehicles', 'shifts', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicleno' => 'required|exists:vehicles,id',
            'drivername' => 'required|exists:users,id',
            'shift' => 'required|exists:shifts,id',
            'capacity' => 'required|numeric',
        ]);

        $assign = VehicleAssign::find($id);
        if (!$assign) {
            return redirect()->route('vassign.index')->with('error', 'Vehicle assignment not found');
        }

        $assign->update([
            'vehicle_id' => $request->vehicleno,
            'user_id' => $request->drivername,
            'shift_id' => $request->shift,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('vassign.index')->with('success', 'Vehicle assignment updated successfully');
    }

    public function destroy($id)
    {
        $assign = VehicleAssign::find($id);
        if (!$assign) {
            return redirect()->route('vassign.index')->with('error', 'Vehicle assignment not found');
        }

        $assign->delete();
        return redirect()->route('vassign.index')->with('success', 'Vehicle assignment deleted successfully');
    }
}
