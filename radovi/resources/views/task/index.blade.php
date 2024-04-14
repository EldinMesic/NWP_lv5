@extends('layouts.app')
@section('content')
@include('task.layout')

<div class="container">
    <h2>Works with Applicants</h2>
    <hr class="my-4">
    @foreach ($tasks as $task)
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $task->work_name }}</h4>
            <p class="card-subtitle">{{ $task->work_name_english }}</p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Applied Students</h5>
            <ul class="list-group">
                @foreach($task->appliedStudents as $student)
                <form action="{{ route('task.updateUser', ['task' => $task, 'user' => $user]) }}" method="GET">
                    @csrf
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <label>{{ $student->name }}</label>
                        <button type="submit" class="btn btn-primary">Accept Application</button>
                    </div>
                </form>
                @endforeach
            </ul>
        </div>
    </div>  
    @endforeach
</div>
@endsection