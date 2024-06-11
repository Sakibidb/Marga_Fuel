<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Cupon;


class PromotionController extends Controller
{

    public function index()
    {
        $cupons=Cupon::all();
        return view('backend.page.promotion.cupon', compact('cupons'));
    }


    public function create()
    {
        return view('backend.page.promotion.cuponcreat');
    }


    public function store(Request $request)
    {
        Cupon::create([
            'use'=>$request->use,
            'name'=>$request->name,
            'code'=>$request->code,
            'sdate'=>$request->sdate,
            'edate'=>$request->edate,
            'dis_type'=>$request->dis_type,
            'amount'=>$request->amount,
            'description'=>$request->description,
        ]);
        // dd($request);

        return redirect()->route('cupon.index')->with('success', 'New shift created successfully');

    }

    public function edit($id)
    {
        $cupon = Cupon::find($id);
        return view('backend.page.promotion.cuponedit', compact('cupon'));
    }

    public function update(Request $request, $id)
    {
        $cupon=Cupon::find($id);
        $cupon->update([
            'use'=>$request->use,
            'name'=>$request->name,
            'code'=>$request->code,
            'sdate'=>$request->sdate,
            'edate'=>$request->edate,
            'dis_type'=>$request->dis_type,
            'amount'=>$request->amount,
            'description'=>$request->description,
        ]);
        return redirect()->route('cupon.index')->with('success', 'New shift created successfully');
    }


    public function destroy($id)
    {
        $cupon = Cupon::find($id);
        $cupon->delete();
        return redirect()->route('cupon.index')->with('success', 'Coupon deleted successfully');
    }
}
