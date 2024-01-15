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
        $request->validate([
            'cate_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'tax' => 'required|numeric',
            'qty' => 'required|numeric',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string',
            'meta_description' => 'required|string',
            'status' => 'boolean',
            'trending' => 'boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product(); // Create a new Product model instance

        // Handle image upload if a file is present in the request
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product', $filename);
            $product->image = $filename;
        }

        // Populate the product model with data from the request
        $product->cate_id = $request->input('cate_id');
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
