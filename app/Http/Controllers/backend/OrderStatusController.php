<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\WebsiteOrder;


class OrderStatusController extends Controller
{

    public function index()
    {
        //
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

    public function edit($id)
    {
        $order = WebsiteOrder::find($id);
        return view('backend.page.orderStatus.index', compact('order'));
    }


    public function update(Request $request, $id)
    {

        $order=WebsiteOrder::find($id);
        $order->update([
            'current_status' => $request->status,
        ]);

        if ($order->current_status == 'Delivered') {
            $order->update([
                'payment_status' => 'Paid',
                'paid_amount' => $order->totalAmount,
                'due_amount' => 0.00,
            ]);

            if ($order->vehicleAssign && $order->vehicleAssign->vehicle) {
                $vehicle = $order->vehicleAssign->vehicle;
                $vehicle->update([
                    'is_free' => 1,
                ]);
            }
        }
        else{
            $order->update([
                'payment_status' => 'Due',
                'paid_amount' => 0.00,
                'due_amount' => $order->totalAmount,
            ]);

            if ($order->vehicleAssign && $order->vehicleAssign->vehicle) {
                $vehicle = $order->vehicleAssign->vehicle;
                $vehicle->update([
                    'is_free' => 0,
                ]);
            }
        }
        return redirect()->route('weborder.index')->with('success', 'Status updated successfully');
    }


    public function destroy($id)
    {
        //
    }
}
