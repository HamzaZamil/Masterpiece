<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.usersTable.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usersTable.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $validatedData = $request->validated();

        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create the user
        User::create($validatedData);

        // Redirect to the users table
        return redirect('/admin/users')->with('success','USER added successfully');
   

    //    $request->validate([
    //     'first_name' => ['required', 'string', 'min:3', 'max:20'],
    //     'last_name' => ['required', 'string', 'min:3', 'max:20'],
    //     'email' => ['required', 'email'],
    //     'gender' => ['required'],
    //     'phone' => ['required'],
    //     'address' => ['nullable'],
    //     'role' => ['required'],
    //    ],[
    //     'first_name.required' => 'You must fill this field'
    //    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.usersTable.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
{
    $validatedData = $request->validated();

    // Hash the password
    $validatedData['password'] = bcrypt($validatedData['password']);

    // Create the user
    $user = User::findOrFail($id);

    // Save changes to the database
    $user->update($validatedData);

    // Redirect with success message
    return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();
    
        // Redirect to the user index page with a success message
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
