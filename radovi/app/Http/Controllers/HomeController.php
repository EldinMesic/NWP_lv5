<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
        $user = User::find(Auth::id());

        if($user->role === 'admin'){
            return view('home.admin', ['users' => User::all()]);

        }else if($user->role === 'professor'){
            return view('home.professor');

        }else if($user->role === 'student'){
            $tasks = Task::doesntHave('student')->get();

            $taskIds = $tasks->pluck('id')->toArray();
            $appliedTaskIds = $user->appliedTasks()->pluck('tasks.id')->toArray();
            $tasks = Task::findMany(array_diff($taskIds, $appliedTaskIds));
            $acceptedTask = $user->appliedTask()->first();
            return view('home.student', ['tasks' => $tasks, 'acceptedTask' => $acceptedTask]);

        }else{
            return view('welcome');
        }
    }
}
