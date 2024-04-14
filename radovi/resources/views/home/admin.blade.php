@extends('layouts.app')
@section('content')
@include('home.welcome')

@if (session('message'))
    <div class="container">
        <div class="alert alert-success col-md-3">
            {{ session('message') }}
        </div>
    </div> 
@endif

<div class="container">
    <div class="row pt-2 mt-4 offset-md-2">
        <div class="col-md-4 py-2 bg-dark text-white">Name</div>
        <div class="col-md-4 py-2 bg-dark text-white">Role</div>
    </div>
    @foreach($users as $index => $user)
        <div class="row py-1 {{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">
            <form action="{{ route('user.updateRole', ['user' => $user]) }}" method="POST" class="w-100" id="userForm{{ $index }}">
                @csrf
                @method('PUT')
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control role-select" name="role" data-index="{{ $index }}" style="cursor: pointer;">
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.role-select').forEach(function(select) {
            select.addEventListener('change', function() {
                var formId = 'userForm' + this.getAttribute('data-index');
                document.getElementById(formId).submit();
            });
        });
    });
</script>

@endsection