<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
}
