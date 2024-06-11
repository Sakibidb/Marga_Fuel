<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Supplier;


class SupplierController extends Controller
{
    public function index()
    {
        $suppliers=Supplier::all();
        return view('backend.page.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('backend.page.supplier.create');
    }


    public function store(Request $request)
    {
        Supplier::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'email' => $request->email,
        ]);
        // dd($request);

        return redirect()->route('supplier.index')->with('success', 'New Supplier created successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $supplier=Supplier::find($id);
        return view('backend.page.supplier.edit', compact('supplier'));
    }


    public function update(Request $request, $id)
    {
        $supplier=Supplier::find($id);

        $supplier->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'email' => $request->email,
        ]);
        // dd($request);

        return redirect()->route('supplier.index')->with('success', ' Supplier update successfully');
    }


    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully');
    }
}
