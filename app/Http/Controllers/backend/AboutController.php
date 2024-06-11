<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Aboutus;


class AboutController extends Controller
{

    public function index()
    {
        $about = Aboutus::first();
        return view('backend.page.about.index', ['about' => $about]);
    }


    public function storeOrUpdate(Request $request)
    {
        $about = Aboutus::first();

        if ($about) {
            // If the record exists, update it
            $about->description = $request->input('content_english');
            $about->banglaDescription = $request->input('content_bangla');
            $about->save();
            $message = 'About data updated successfully!';
        } else {
            // If the record doesn't exist, create a new one
            $about = new Aboutus();
            $about->description = $request->input('content_english');
            $about->banglaDescription = $request->input('content_bangla');
            $about->save();
            $message = 'About data saved successfully!';
        }

        return redirect()->route('about.index')->with('success', $message);
    }
}
