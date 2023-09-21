<?php
namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function index(){

        //Fetch Products List
        $products  = Product::all();
        return view('admin.product.index', compact('products'));
    }


    //Open Page Add Products
    function add(){
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    //Adding Products

    function insert(Request $request){
        $product = new Product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0' ;
        $product->trending = $request->input('trending') == TRUE ? '1':'0' ;
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->save();
        return redirect('products')->with('status', "product Added Successfully");
    }

    //Just open edit page with filled values
    function edit($id){
        $categories = Product::all();
        $products = Product::find($id);
        // dd($products[0]->category->name);
        return view('admin.product.edit', compact('products','categories'));
    }

    public function update(Request $request, $id){
        $products = Product::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/product/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1':'0' ;
        $products->trending = $request->input('trending') == TRUE ? '1':'0' ;
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->update();
        return redirect('products')->with('status', "Product Updated Successfully");
    }

    public function destroy($id){
        $products = Product::find($id);
        $path = 'assets/uploads/product/'.$products->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $products->delete();
        return redirect('products')->with('status', "Product Deleted Successfully");
    }
}
