<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Driver;


class DriverController extends Controller
{

    public function index()
    {
        $drivers = Driver::all();
        return view('backend.page.driver.index', compact('drivers'));

    }

    public function create()
    {
        return view('backend.page.driver.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'drivinglicense' => 'nullable|string',
        'nid' => 'nullable|string',
        'password' => 'nullable|string',
        'licenseImage' => 'image',
        'nidimage' => 'image',
    ]);

    $validatedData = $request->except('licenseImage', 'nidimage');

    if ($request->hasFile('licenseImage')) {
        $licenseImage = $request->file('licenseImage');
        $licenseImageName = time() . '.' . $licenseImage->getClientOriginalExtension();
        $licenseImage->move(public_path('images'), $licenseImageName);
        $validatedData['licenseImage'] = $licenseImageName;
    }

    if ($request->hasFile('nidimage')) {
        $nidImage = $request->file('nidimage');
        $nidImageName = time() . '_nid.' . $nidImage->getClientOriginalExtension();
        $nidImage->move(public_path('images'), $nidImageName);
        $validatedData['nidimage'] = $nidImageName;
    }

    Driver::create($validatedData);
    return redirect()->route('driver.index')->with('success', 'New driver created successfully');
    }


    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('backend.page.driver.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'drivinglicense' => 'nullable|string',
        'nid' => 'nullable|string',
        'password' => 'nullable|string',
        'licenseImage' => 'image',
        'nidimage' => 'image',
    ]);

    $driver = Driver::find($id);
    $validatedData = $request->except('licenseImage', 'nidimage');

    if ($request->hasFile('licenseImage')) {
        $licenseImage = $request->file('licenseImage');
        $licenseImageName = time() . '.' . $licenseImage->getClientOriginalExtension();
        $licenseImage->move(public_path('images'), $licenseImageName);
        $validatedData['licenseImage'] = $licenseImageName;
        // Delete old license image if it exists
        if ($driver->licenseImage) {
            unlink(public_path('images/' . $driver->licenseImage));
        }
    }

    if ($request->hasFile('nidimage')) {
        $nidImage = $request->file('nidimage');
        $nidImageName = time() . '_nid.' . $nidImage->getClientOriginalExtension();
        $nidImage->move(public_path('images'), $nidImageName);
        $validatedData['nidimage'] = $nidImageName;
        // Delete old nid image if it exists
        if ($driver->nidimage) {
            unlink(public_path('images/' . $driver->nidimage));
        }
    }


    $driver->update($validatedData);
    return redirect()->route('driver.index')->with('success', 'Driver updated successfully');
    }
    public function show($id)
{
    // Logic to retrieve and display a specific driver
}

    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect()->route('driver.index')->with('success', 'driver deleted successfully');
    }
}
