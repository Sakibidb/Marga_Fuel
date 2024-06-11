<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\backend\Privacy;
use App\Models\backend\TermsCondition;
use App\Models\backend\Refund;
use App\Models\backend\Aboutus;
use App\Models\backend\ProductModel;
use App\Models\backend\CompanyInformation;



class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = CompanyInformation::all();
        $products = ProductModel::all();
        return view('frontend.home.index', compact('products', 'contacts'));
    }

    public function about()
    {
        $about = Aboutus::first();
        return view('frontend.home.about.index', compact('about',));
    }
    public function privacy()
    {
        $privacy = Privacy::first();
        return view('frontend.home.about.privacypolicy', compact('privacy',));
    }
    public function returnpolicy()
    {
        $refund = Refund::all();
        return view('frontend.home.about.returnpolicy', compact('refund',));
    }
    public function terms()
    {
        $terms = TermsCondition::all();
        return view('frontend.home.about.terms', compact('terms',));
    }
    public function contract()
    {
        $contacts = CompanyInformation::all();
        return view('frontend.home.contact.index', compact('contacts'));
    }
    public function card()
    {
        $products = ProductModel::all();
        return view('frontend.home.card.index', compact('products',));
    }
    public function footer()
    {
        return view('frontend.home.layouts.footer');
    }

    // public function header()
    // {
    //     $products = ProductModel::all();
    //     return view('frontend.home.card.index',compact('products'));
    // }

    // public function showcard()
    // {
    //     $products = ProductModel::all();
    //     return view('frontend.home.layouts.card',compact('products'));
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function aboutApi()
    {
        $about = Aboutus::first();
        if ($about) {
            return response()->json($about, 200);
        } else {
            return response()->json(['message' => 'About us information not found'], 404);
        }
    }

    // public function privacyApi()
    // {
    //     $privacy = Privacy::first();
    //     if ($privacy) {
    //         return response()->json($privacy, 200);
    //     } else {
    //         return response()->json(['message' => 'Privacy policy not found'], 404);
    //     }
    // }

    public function returnpolicyApi()
    {
        $refund = Refund::first();
        if ($refund) {
            return response()->json($refund, 200);
        } else {
            return response()->json(['message' => 'Return policy not found'], 404);
        }
    }

    // public function returnpolicyApi()
    // {
    //     $refund = Refund::all();

    //     if ($refund->isEmpty()) {
    //         return response()->json(['message' => 'Return policy not found'], 404);
    //     }

    //     if ($refund->count() == 1) {
    //         return response()->json($refund->first(), 200);
    //     }

    //     return response()->json($refund, 200);
    // }

    public function termsApi()
    {
        $terms = TermsCondition::first();

        if ($terms->isEmpty()) {
            return response()->json(['message' => 'Terms and conditions not found'], 404);
        }

        if ($terms->count() == 1) {
            return response()->json($terms->first(), 200);
        }

        return response()->json($terms, 200);
    }

    public function privacyApi()
{
    $privacy = Privacy::first();
    if (!$privacy) {
        return response()->json(['message' => 'Privacy policy not found'], 404);
    }

    return response()->json($privacy, 200);
}

}
