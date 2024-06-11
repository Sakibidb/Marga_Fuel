<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\CategoryModel;
use App\Models\backend\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = ProductModel::with('categorydi')->get();
        return view('backend.page.product.allProduct', compact('products'));
    }
    public function create()
    {
        return view('backend.page.product.create');
    }

    public function productApi()
    {
        $products = ProductModel::all();

        return response([
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'price' => 'nullable',
        'stock' => 'nullable',
        'image' => 'image',
    ]);

    $validatedData = $request->except('image');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $ImageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $ImageName);
        $validatedData['image'] = $ImageName;
    }

    ProductModel::create($validatedData);
    return redirect()->route('products.index')->with('success', 'New products created successfully');
    }

    public function edit($id)
    {
        $product=ProductModel::find($id);
        return view('backend.page.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'nullable',
        'stock' => 'nullable',
        'image' => 'image',
    ]);

    $product = ProductModel::find($id);
    $validatedData = $request->except('image');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $validatedData['image'] = $imageName;
        if ($product->image) {
            unlink(public_path('images/' . $product->image));
        }
    }

    $product->update($validatedData);
    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}

    public function destroy(ProductModel $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', "%{$search}%")->get();
        return response()->json($products);
    }

}
