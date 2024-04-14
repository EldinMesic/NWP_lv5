<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateRole(Request $request, User $user){
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('message', 'User role updated successfully');
    }
}
