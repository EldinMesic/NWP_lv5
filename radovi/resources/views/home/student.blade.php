@extends('layouts.app')
@section('content')
@include('home.layout')

@if (is_null($acceptedTask))

<div class="container">
    <h2>Available Projects</h2>
    <hr class="my-4">
    @foreach ($tasks as $task)
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $task->work_name }}</h4>
            <p class="card-subtitle">{{ $task->work_name_english }}</p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Professor: {{ $task->profesor->name }}</h5>
            <h6 class="card-subtitle">{{ $task->work_task }} work</h6>
            <form action="{{ route('task.apply', ['task' => $task]) }}" method="GET">
                @csrf
                <div class="form-group d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </form>
        </div>
    </div>  
    @endforeach
</div>

@else

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Congratulations!</h1>
        <p class="lead">Professor {{ $acceptedTask->professor->name }} has accepted your application</p>
    </div>
    <div class="mt-2">
        <h3>Accepted Application</h3>
        <hr class="my-1">
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $acceptedTask->work_name }}</h4>
            <p class="card-subtitle">{{ $acceptedTask->work_name_english }}</p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Professor: {{ $acceptedTask->profesor->name }}</h5>
            <h6 class="card-subtitle">{{ $acceptedTask->work_task }} work</h6>
        </div>
    </div> 
</div>
    
@endif

@endsection