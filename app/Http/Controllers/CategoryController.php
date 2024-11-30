<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categoriesTable.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoriesTable.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'category_name' => 'required|string|max:255',
        'category_description' => 'nullable|string|max:1000', // Adjusted to string for descriptions
        'category_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Handle file upload for category picture
    if ($request->hasFile('category_picture')) {
        $imagePath = $request->file('category_picture')->store('categories', 'public');
        $validatedData['category_picture'] = basename($imagePath);
    }

    // Create a new category record using the validated data
    Category::create($validatedData); // Correct usage of the validated data

    // Redirect to the categories index page with a success message
    return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::all();
        return view('admin.categoriesTable.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categoriesTable.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'category_name' => 'required|string|max:255',
        'category_description' => 'nullable|string|max:1000',
        'category_picture' => 'nullable|max:2048',
    ]);

    // Find the category by ID or fail
    $category = Category::findOrFail($id);

    // Handle file upload for category picture if necessary
    if ($request->hasFile('category_picture')) {
        if ($category->category_picture) {
            Storage::disk('public')->delete('categories/' . $category->category_picture);
        }
        $path = $request->file('category_picture')->store('categories', 'public');
        $validatedData['category_picture'] = basename($path);
    }

    // Update the category
    $category->update($validatedData);

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}
