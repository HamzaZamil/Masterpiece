<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetRequest; // Assuming you create a request for validation
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pet::all(); // Retrieve all pets
        return view('admin.petsTable.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petsTable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'pet_name' => 'required|string|max:255',
        'pet_type' => 'required|string',
        'pet_breed' => 'required|string|max:255',
        'pet_age' => 'required|integer|min:0',
        'pet_weight' => 'required|numeric|min:0',
        'pet_gender' => 'required|string',
        'pet_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Handle file upload for pet image
    if ($request->hasFile('pet_image')) {
        $imagePath = $request->file('pet_image')->store('pets', 'public');
        $validatedData['pet_image'] = basename($imagePath);
    }

    // Create a new pet record using the validated data
    Pet::create($validatedData);

    // Redirect to the pet index page with a success message
    return redirect()->route('admin.pets.index')->with('success', 'Pet added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pet = Pet::findOrFail($id); // Find the pet or throw a 404
        return view('admin.pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pet = Pet::findOrFail($id); // Find the pet to edit
        return view('admin.petsTable.update', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{

    $validatedData = $request->validate([
        'pet_name' => 'required|string|max:255',
        'pet_type' => 'required|string',
        'pet_breed' => 'required|string|max:255',
        'pet_age' => 'required|integer|min:0',
        'pet_weight' => 'required|numeric|min:0',
        'pet_gender' => 'required|string|in:Male,Female',
    ]);

    $pet = Pet::findOrFail($id);

    // Handle file upload if necessary
    if ($request->hasFile('pet_image')) {
        $path = $request->file('pet_image')->store('pets', 'public');
        $validatedData['pet_image'] = $path;
    }

    $pet->update($validatedData);

    return redirect()->route('admin.pets.index')->with('success', 'Pet updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id);

        // Delete the pet
        $pet->delete();

        // Redirect with a success message
        return redirect()->route('admin.pets.index')->with('success', 'Pet deleted successfully!');
    }
}