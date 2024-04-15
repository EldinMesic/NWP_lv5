<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id());

        $tasks = $user->createdTasks->filter(function ($task){
            return $task->appliedStudents()->exists();
        });
        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');
        $user = User::find(Auth::id());
        try {
            $user->createdTasks()->create($post); 
            return back()->with('message', 'Work created successfully');
        } catch (MassAssignmentException $e) {
            return back()->with('message', 'Failed to create Work');
        }
    }

    public function updateUser(Task $task, User $user){
        if($user->appliedTask()->doesntExist() && in_array($task, $user->appliedTasks()->get()->toArray())){
            $user->appliedTasks()->detach();
            $task->student()->associate($user);

            $user->save();
            $task->save();
            return route('task.index');
        }else{
            return redirect()->back();
        }
    }

    public function apply(Task $task){
        $user = User::find(Auth::id());

        if(!is_null($task) && !is_null($user) && $user->appliedTask()->doesntExist()){
            $user->appliedTasks()->attach($task->id);

            return redirect()->back()->with('message','Successfully Applied');

        }else{
            return redirect()->back();
        }
    }
}
