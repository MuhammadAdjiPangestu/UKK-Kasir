<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // READ users
    public function index()
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users,
        ]);
    }

    // CREATE user (Show the form)
    public function create()
    {
        return view('user.create');
    }

    // STORE user (Handle form submission)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:pelanggan,admin',
            // Add more validation rules for additional user details if needed
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            // Add more fields for additional user details if needed
        ]);

        return redirect('/data-user')->with('alert', 'User added successfully.');
    }

    // UPDATE user (Show the edit form)
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    // UPDATE user (Handle form submission)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:pelanggan,admin',
            // Add more validation rules for additional user details if needed
        ]);

        $user = User::find($id);

        if (!$user) {
            abort(404); // or redirect, show an error, etc.
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        // Update more fields for additional user details if needed
        $user->save();

        return redirect('/data-user')->with('alert', 'User updated successfully.');
    }

    // DELETE user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/data-user')->with('alert', 'User deleted successfully.');
    }
}
