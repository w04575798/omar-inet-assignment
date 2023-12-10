<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //

    public function index()
    {
        // Retrieve users with at least one role
        $users = User::has('roles')->get();

        // Get all existing role IDs
        $roleIds = Role::pluck('id');

        return view('users.index', ['users' => $users, 'roleIds' => $roleIds]);

    }
    public function create()
    {
        $users = User::has('roles')->get();
        $roles = Role::all();
        return view('users.create', compact('users', 'roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,id', // Validate that the selected role exists
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Attach the selected role to the user
        $user->roles()->attach($request->role);

        return redirect()->route('users.index')->with('status', 'User created successfully');
    }

    public function edit(User $user)
    {
        // Fetch the user roles
        $roles = Role::all();

        // Return the edit view with user and roles
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id . '|max:255',
            'role' => 'required|exists:roles,id',
        ]);

        // Update user information
        $user->update([
            'name' => $request->name,
        ]);

        // Sync roles
        $user->roles()->sync([$request->role]);

        return redirect()->route('users.index')->with('status', 'User updated successfully');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        // Soft delete the user
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User deleted successfully');
    }



}
