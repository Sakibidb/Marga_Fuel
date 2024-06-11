<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\WebsiteOrder;
use App\Models\backend\OrderPageSelectColumn;
use App\Models\backend\OrderStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class WebsiteOrderController extends Controller
{

    public function index()
    {
        // $weborders=WebsiteOrder::all();
        // return view('backend.page.websiteorder.index', compact('weborders'));

        $activeOrdersCount = WebsiteOrder::count();
        $weborders = WebsiteOrder::all();
        $statuses = OrderStatus::all();
        // dd($weborders);
        return view('backend.page.websiteorder.index', compact('weborders', 'activeOrdersCount', 'statuses',));
    }

    public function order(Request $request)
    {
        // dd($request->all());
        $name = $request->query('name');
        $price = $request->query('price');
        $product_id = $request->query('product_id');
        $image = $request->input('image');
        $totalAmount = 0;
        $selects = OrderPageSelectColumn::all();

        return view('frontend.home.order.index', compact('selects'), ['name' => $name, 'price' => $price, 'product_id' => $product_id, 'image' => $image])->with('totalAmount', $totalAmount);
    }

    public function create()
    {
    }
//

    public function store(Request $request)
    {

        $phone = Auth::check() ? Auth::user()->mobile : $request->phone;
        $email = 'customer' . time() . '@example.com';

        // Ensure the email is unique
        while (User::where('email', $email)->exists()) {
            $email = 'customer' . time() . '@example.com';
        }
        $user = User::updateOrCreate(
            [
                'mobile' => $request->phone,
            ],
            [
                // 'address' => $request->address,
                'role' => '2',
                'email' => $email,
                'name' => 'customer',
                'password' => Hash::make($request->phone),
            ]
        );

        // Ensure the user was created or updated successfully
        if (!$user) {
            return redirect()->back()->with('error', 'User creation failed');
        }

        $attributes = [
            'customer'      => $phone,
            'customer_id'   => $user->id,
            'address'       => $request->address,
            'location'      => $request->location,
            'totalAmount'   => $request->totalAmount,
            'quantity'      => $request->quantity ? $request->quantity : $request->inputQuantity,
            'productName'   => $request->productName,
            'product_id'    => $request->product_id,
            'vehicle'       => $request->vehicle,
            'paymentMethod' => $request->paymentMethod,
        ];

        // Add additional attributes based on the payment method
        if ($request->paymentMethod == 'cash_on_delivery') {
            $attributes['due_amount'] = $request->totalAmount;
            $attributes['paid_amount'] = 0.00;
            $attributes['payment_status'] = 'Due';
        } else {
            $attributes['paid_amount'] = $request->totalAmount;
            $attributes['due_amount'] = 0.00;
            $attributes['payment_status'] = 'Paid';
        }

        // dd($attributes);

        // Use create to always create a new record
        WebsiteOrder::create($attributes);

        if ($request->paymentMethod === 'online') {
            return redirect()->route('pay.index')->with('success', 'Order successfully');
        } else {
            // Ensure the user instance is fresh
            $user = User::find($user->id);
            // Auth::login($user);

             // Debug the user instance
        Log::info('User before login:', ['user' => $user]);

        // Log in the user using the user ID
        Auth::loginUsingId($user->id);

        // Log to see if the user is logged in
        Log::info('User logged in:', ['user_id' => Auth::id()]);

        // Regenerate session to avoid session fixation
        $request->session()->regenerate();

            return redirect()->route('userdeshboard')->with('success', 'Order successfully');
        }
    }

    public function destroy($id)
    {
        $weborder = WebsiteOrder::find($id);
        $weborder->delete();
        return redirect()->route('weborder.index')->with('success', 'Order deleted successfully');
    }


    public function orderApi(Request $request)
    {
        // // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'phone' => 'required|string',
        //     'address' => 'required|string',
        //     'location' => 'required|string',
        //     'totalAmount' => 'required|numeric',
        //     'quantity' => 'required|integer',
        //     'productName' => 'required|string',
        //     'product_id' => 'required|integer',
        //     'vehicle' => 'nullable|string',
        //     'paymentMethod' => 'required|string|in:cash_on_delivery,online',
        // ]);

        // Determine phone number
        $phone = Auth::check() ? Auth::user()->mobile : $request->phone;

        // Update or create the user based on the phone number
        $user = User::updateOrCreate(
            [
                'mobile' => $request->phone,
            ],
            [
                'role' => '2',
                'email' => 'customer' . time() . '@example.com',
                'name' => 'customer',
                'password' => Hash::make($request->phone),
            ]
        );

        // Prepare the order attributes
        $attributes = [
            'customer' => $phone,
            'address' => $request->address,
            'totalAmount' => $request->totalAmount,
            'quantity' => $request->quantity,
            'productName' => $request->productName,
            'product_id' => $request->product_id,
            'paymentMethod' => $request->paymentMethod,
        ];

        // Add additional attributes based on the payment method

        $order = WebsiteOrder::create($attributes);

        // Return a JSON response indicating success
        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'order' => $order,
        ], 201);
    }

    public function orderStatusView($id)
    {

        $order = WebsiteOrder::find($id);
        return view('backend.page.orderStatus.index', compact('order'));
    }

    public function orderStatus(Request $request)
    {
        $existingOrderStatus = OrderStatus::where('order_id', $request->order_id)->first();

        if ($existingOrderStatus) {
            // Update the existing record
            $existingOrderStatus->update([
                'status' => $request->status,
                'Assign_delivery_man' => $request->Assign_delivery_man,
            ]);
        } else {
            // Create a new record
            OrderStatus::create([
                'order_id' => $request->order_id,
                'status' => $request->status,
                'Assign_delivery_man' => $request->Assign_delivery_man,
            ]);
        }

        // $existingOrder = WebsiteOrder::find($existingOrderStatus->id);

        // if ($existingOrder && $existingOrder->status == 'Delivered') {
        //     // Update the status of the order
        //     $existingOrder->update([
        //         'status' => 'Paid',
        //     ]);
        // }

        return redirect()->route('weborder.index')->with('success', 'Status updated successfully');
    }
}
