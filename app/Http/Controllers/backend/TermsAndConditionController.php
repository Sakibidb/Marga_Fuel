<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\TermsCondition;

class TermsAndConditionController extends Controller
{


    public function index()
    {
        $terms=TermsCondition::first();
        return view('backend.page.termsAndCondition.index', ['terms' => $terms]);
    }

    public function storeOrUpdate(Request $request)
    {
        $terms = TermsCondition::first(); // Get the first privacy record

        if ($terms) {
            // If the record exists, update it
            $terms->description = $request->input('content_english');
            $terms->banglaDescription = $request->input('content_bangla');
            $terms->save();
            $message = 'Terms data updated successfully!';
        } else {
            // If the record doesn't exist, create a new one
            $terms = new TermsCondition();
            $terms->description = $request->input('content_english');
            $terms->banglaDescription = $request->input('content_bangla');
            $terms->save();
            $message = 'Terms data saved successfully!';
        }

        return redirect()->route('terms.index')->with('success', $message);
    }
}
