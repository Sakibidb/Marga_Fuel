<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\backend\Customer;
use App\Models\backend\WebsiteOrder;
use App\Models\backend\UserByOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function driverstatus($id)
    {
        $order=WebsiteOrder::find($id);
        return view('frontend.auth.user.driverstatus',compact('order'));
    }

    public function driverstatusUpdate(Request $request, $id)
    {

        $order=WebsiteOrder::find($id);

        $order->update([
            'driver_status' => $request->status,
        ]);
        return redirect()->route('userdeshboard')->with('success', 'Update successfully');
        // dd($request->status);
    }

    public function user()
    {
        $user = Auth::user();

            $orders = WebsiteOrder::where('customer', $user->mobile)
            ->orWhereHas('vehicleAssign.user', function ($query) use ($user) {
                $query->where('nid', $user->nid);
            })
            ->get();

        return view('frontend.auth.user.deshboard', compact('orders'));
    }

}
