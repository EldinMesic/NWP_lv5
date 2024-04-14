@extends('layouts.app')
@section('content')
@include('task.layout')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('lang.switch') }}" method="POST" class="form-inline">
                @csrf
                <div class="d-flex align-items-center">
                    <div class="form-group m-2">
                        <label for="locale" class="mr-2">{{ __('task.general.language') }}:</label>
                    </div>
                    <div class="form-group m-2">
                        <select class="form-control" id="locale" name="locale" onchange="this.form.submit()" style="cursor: pointer">
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{ __('task.general.language_options.english') }}</option>
                            <option value="hr" {{ app()->getLocale() == 'hr' ? 'selected' : '' }}>{{ __('task.general.language_options.croatian') }}</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>{{ __('task.general.create_new_work') }}</h2>
            <hr class="my-4">
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="work_name">{{ __('task.labels.work_name') }}</label>
                    <input type="text" class="form-control" id="work_name" name="work_name" required>
                </div>
                <div class="form-group">
                    <label for="work_name_english">{{ __('task.labels.work_name_english') }}</label>
                    <input type="text" class="form-control" id="work_name_english" name="work_name_english" required>
                </div>
                <div class="form-group">
                    <label for="work_task">{{ __('task.labels.work_mission') }}</label>
                    <textarea class="form-control" id="work_task" name="work_task" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="study_type">{{ __('task.labels.study_type') }}</label>
                    <select class="form-control" id="study_type" name="study_type" required style="cursor: pointer;">
                        <option value="" disabled selected hidden>{{ __('task.options.study_types_placeholder') }}</option>
                        @foreach(__('task.options.study_types') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="mt-3 btn btn-primary">{{ __('task.buttons.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection