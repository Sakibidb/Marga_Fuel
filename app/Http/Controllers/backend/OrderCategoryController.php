<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\OrderPageSelectColumn;

class OrderCategoryController extends Controller
{
    public function index()
    {
        $selects=OrderPageSelectColumn::all();
        return view('backend.page.OrderPageSelectColumn.index',compact('selects'));
    }


    public function create()
    {
        return view('backend.page.OrderPageSelectColumn.create');
    }


    public function store(Request $request)
    {
        OrderPageSelectColumn::create([
            'category_en' => $request->category_en,
            'category_bn' => $request->category_bn,
        ]);
        // dd($request);
        return redirect()->route('select.index')->with('success', 'Category created successfully');

    }

    public function edit($id)
    {
        $select=OrderPageSelectColumn::find($id);
        return view('backend.page.OrderPageSelectColumn.edit', compact('select'));

    }


    public function update(Request $request, $id)
    {
        $select=OrderPageSelectColumn::find($id);

        $select-> update([
            'category_en' => $request->category_en,
            'category_bn' => $request->category_bn,
        ]);
        // dd($request);
        return redirect()->route('select.index')->with('success', 'Category created successfully');
    }

    public function destroy($id)
    {
        $select = OrderPageSelectColumn::find($id);
        $select->delete();
        return redirect()->route('select.index')->with('success', 'Category deleted successfully');
    }
}
