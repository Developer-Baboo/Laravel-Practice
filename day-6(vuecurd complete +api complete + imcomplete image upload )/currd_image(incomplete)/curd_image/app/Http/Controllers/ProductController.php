<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('Products.index', [
            'products' => Product::orderBy('id', 'desc')->get()
        ]);
    }
  public function create(){
    return view('Products.create');
  }

  public function store(Request $request){
    //validation data
    $request->validate([
        'name' =>'required',
        'description'=> 'required',
        'image' => 'required'
    ]);
    // dd($request->all());
    //Upload image
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products') ,$imageName);
    // dd($imageName);
    $product = new Product();
    $product->image = $imageName;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->save();
    return back()->withSuccess("Product Created...!!!");
  }

  public function edit($id){
    // dd($id);
    $product = Product::where('id', $id)->first();
    return view('products.edit', ['product' => $product]);
  }
}
