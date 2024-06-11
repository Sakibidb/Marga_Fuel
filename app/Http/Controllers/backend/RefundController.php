<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Refund;

class RefundController extends Controller
{

    public function index()
    {
        $refund=Refund::first();
        return view('backend.page.refund.index', ['refund' => $refund]);
    }

    public function storeOrUpdate(Request $request)
    {
        $refund = Refund::first(); // Get the first privacy record

        if ($refund) {
            // If the record exists, update it
            $refund->description = $request->input('content_english');
            $refund->banglaDescription = $request->input('content_bangla');
            $refund->save();
            $message = 'Refund data updated successfully!';
        } else {
            // If the record doesn't exist, create a new one
            $refund = new Refund();
            $refund->description = $request->input('content_english');
            $refund->banglaDescription = $request->input('content_bangla');
            $refund->save();
            $message = 'Refund data saved successfully!';
        }

        return redirect()->route('refund.index')->with('success', $message);
    }
}
