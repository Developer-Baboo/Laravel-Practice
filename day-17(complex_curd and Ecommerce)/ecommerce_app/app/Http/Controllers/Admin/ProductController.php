<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Notifications\ProductNotification;

class ProductController extends Controller
{
    // Display a list of products
    function index()
    {
        session()->forget(['errors', 'old']);
        // Fetch all products from the database
        $products = Product::all();
        return view('admin.product.index', compact('products')); // Return the view with the product data
    }

    // Display the add product form
    function add()
    {
        $categories = Category::all(); // Fetch all categories to populate the category dropdown
        return view('admin.product.add', compact('categories')); // Return the add view with category data
    }

    // Insert a new product into the database
    function insert(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $request->validate([
            'cate_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug|max:255',
            'small_description' => 'required|string|max:255',
            'description' => 'required|string',
            'original_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'status' => 'required|boolean',
            'trending' => 'required|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(
                'assets/uploads/product',
                $filename
            );
        }

        // Create a new Product model instance
        $product = new Product();

        // Populate the product model with data from the validated request
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status');
        $product->trending = $request->input('trending');
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->image = $filename ?? null;

        // Save the product to the database
        $product->save();

        $users = User::all();

        // Send notification to each user
        foreach ($users as $user) {
            $user->notify(new ProductNotification($product));
        }

        // Redirect to the products page with a success message
        return redirect('products')->with('status', "Product Added Successfully");
    }

    // Display the edit product form for a specific product
    function edit($id)
    {
        $categories = Category::all(); // Fetch all categories to populate the category dropdown
        $product = Product::find($id); // Find the product by its ID

        // dd($categories);

        return view('admin.product.edit', compact('product', 'categories')); // Return the edit view with the product and category data
    }

    // Update a specific product in the database
    public function update(Request $request, $id)
    {
        $product = Product::find($id); // Find the product by its ID

        // Handle image upload if a file is present in the request
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/product/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product', $filename);
            $product->image = $filename;
        }

        // Update the product data from the request
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1' : '0';
        $product->trending = $request->input('trending') == TRUE ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');

        // Save the updated product to the database
        $product->update();

        // Redirect to the products page with a success message
        return redirect('products')->with('status', "Product Updated Successfully");
    }

    // Delete a specific product from the database
    public function destroy($id)
    {
        $product = Product::find($id); // Find the product by its ID

        // Delete the product's image file, if it exists
        if ($product->image) {
            $path = 'assets/uploads/product/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        // Delete the product from the database
        $product->delete();

        // Redirect to the products page with a success message
        return redirect('products')->with('status', "Product Deleted Successfully");
    }
}
