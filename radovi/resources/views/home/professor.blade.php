@extends('layouts.app')
@section('content')
@include('home.layout')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="text-center mt-4">
                <a class="btn btn-primary btn-lg mr-2" href="{{ route('task.index') }}">Projects</a>
                <a class="btn btn-success btn-lg" href="{{ route('task.create') }}">Add Project</a>
            </div>
        </div>
    </div>
</div>

@endsection