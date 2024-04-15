<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function updateRole(Request $request, User $user){
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('message', 'User role updated successfully');
    }

    public function changeLanguage(Request $request){
        $locale = $request->input('locale');

        if(in_array($locale, ['en', 'hr'])){
            App::setLocale($locale);
            Session::put('language', $locale);
        }

        return redirect()->route('task.create');
    }

}
