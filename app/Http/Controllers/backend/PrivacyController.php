<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Privacy;

class PrivacyController extends Controller
{

    public function index()
    {
        $privacy = Privacy::first(); // Get the first privacy record
        return view('backend.page.privacy.index', ['privacy' => $privacy]);
    }

    public function storeOrUpdate(Request $request)
    {
        $privacy = Privacy::first(); // Get the first privacy record

        if ($privacy) {
            // If the record exists, update it
            $privacy->description = $request->input('content_english');
            $privacy->banglaDescription = $request->input('content_bangla');
            $privacy->save();
            $message = 'Privacy data updated successfully!';
        } else {
            // If the record doesn't exist, create a new one
            $privacy = new Privacy();
            $privacy->description = $request->input('content_english');
            $privacy->banglaDescription = $request->input('content_bangla');
            $privacy->save();
            $message = 'Privacy data saved successfully!';
        }

        return redirect()->route('privacy.index')->with('success', $message);
    }
}
