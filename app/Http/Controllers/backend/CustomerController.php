<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Country;
use App\Models\backend\Customer;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::with('countryss')->get();
        return   view('backend.page.customer.index', compact('customers'));
    }


    public function create()
    {
        $countries = Country::all();
        return view('backend.page.customer.create', compact('countries'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            // 'password' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        // $customer->gender = $request->input('gender');
        $customer->address = $request->input('address');
        $customer->shipping_address = $request->input('shipping_address');
        $customer->country_id = $request->input('country');


        // $customer->password = Hash::make($request->input('password'));

        // Save the customer
        $customer->save();

        // Redirect back to the index page with success message
        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }


    public function edit($id)
    {
        // Find the customer by id
        $customer = Customer::findOrFail($id);

        // Return the view for editing the customer
        return view('backend.page.customer.edit', compact('customer'));
    }


    public function update(Request $request, $id)
    {
        // Find the customer by id
        $customer = Customer::findOrFail($id);

        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        // Update customer data
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        // $customer->gender = $request->input('gender');
        $customer->address = $request->input('address');
        $customer->shipping_address = $request->input('shipping_address');
        $customer->country_id = $request->input('country');

        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
