@extends('layouts.app')
@section('content')
@include('home.layout')

<div class="container">
    <div class="row pt-2 mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-6 py-2 bg-dark text-white">Name</div>
                <div class="col-md-6 py-2 bg-dark text-white">Role</div>
            </div>
        </div>
        
    </div>
    @foreach($users as $user)
        <div class="row py-1">
            <form action="{{ route('user.updateRole', ['user' => $user]) }}" method="POST" class="w-100">
                @csrf
                @method('PUT')
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control role-select" name="role" style="cursor: pointer;" onchange="this.form.submit()">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="professor" {{ $user->role === 'professor' ? 'selected' : '' }}>Professor</option>
                                <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
</div>

@endsection