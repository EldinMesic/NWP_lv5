@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <p class="card-text">Your role is: {{ $user->role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
