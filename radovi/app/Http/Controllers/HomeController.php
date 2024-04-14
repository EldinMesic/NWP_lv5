<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        switch ($user->role) {
            case 'student':
                return view('home.student');
            case 'professor':
                return view('home.professor');
            case 'admin':
                return view('home.admin', ['users' => User::all()]);
            default:
            return view('welcome');
        }
    }
}
