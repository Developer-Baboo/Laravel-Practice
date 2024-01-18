<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // Display a list of categories
    function index()
    {
        $category = Category::all(); // Fetch all categories from the database
        return view('admin.category.index', compact('category')); // Return the view with the category data
    }

    // Display the add category form
    function add()
    {
        return view('admin.category.add'); // Return the view for adding a category
    }

    // Insert a new category into the database
    function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);
        $category = new Category(); // Create a new Category model instance

        // Handle image upload if a file is present in the request
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }

        // Populate the category model with data from the request
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');

        // Save the category to the database
        $category->save();

        // Redirect back to the dashboard with a success message
        return redirect('/categories')->with('status', "Category Added Successfully");
    }

    // Display the edit category form for a specific category
    function edit($id)
    {
        $category = Category::find($id); // Find the category by its ID
        return view('admin.category.edit', compact('category')); // Return the edit view with the category data
    }

    // Update a specific category in the database
    function update(Request $request, $id)
    {
        $category = Category::find($id); // Find the category by its ID

        // Handle image upload if a file is present in the request
        if ($request->hasFile('image')) {
            // Delete the previous image file, if it exists
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            // Upload and store the new image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }

        // Update the category data from the request
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');

        // Save the updated category to the database
        $category->update();

        // Redirect to the categories page with a success message
        return redirect('categories')->with('status', "Category Updated Successfully");
    }

    // Delete a specific category from the database
    function destroy($id)
    {
        $category = Category::find($id); // Find the category by its ID

        // Delete the category's image file, if it exists
        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        // Delete the category from the database
        $category->delete();

        // Redirect to the categories page with a success message
        return redirect('categories')->with('status', "Category Deleted Successfully");
    }
}
