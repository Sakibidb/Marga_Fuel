<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Shift;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ShiftController extends Controller
{

    public function index()
    {
        $shifts=Shift::all();
        return view('backend.page.shift.index', compact('shifts'));

    }


    public function create()
    {
        return view('backend.page.shift.create');
    }

    public function store(Request $request)
    {

        Shift::create([
            'name' => $request->name,
            'stime' => $request->stime,
            'etime' => $request->etime,
        ]);
        // dd($request);

        return redirect()->route('shift.index')->with('success', 'New shift created successfully');
    }


    public function edit($id)
    {
        $shift = Shift::find($id);
        return view('backend.page.shift.edit', compact('shift'));
    }


    public function update(Request $request, $id)
    {
        $shift=Shift::find($id);
        $shift->update([
            'name' => $request->name,
            'stime' => $request->stime,
            'etime' => $request->etime,
        ]);
        return redirect()->route('shift.index')->with('success', 'New shift created successfully');
    }

    public function destroy($id)
    {
        $shift = Shift::find($id);
        $shift->delete();
        return redirect()->route('shift.index')->with('success', 'shift deleted successfully');
    }
}
