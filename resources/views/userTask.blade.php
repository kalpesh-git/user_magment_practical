@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Task') }} ( {{$name}} ) <a href="{{ route('admin.home') }}">Home</a> @if(!empty($task)) | <a href="{{ route('admin.usertasks',['userId' => $task->userId]) }}">Back</a> @endif  </div>

                <div class="card-body">
                <form method="POST" @if(!empty($action) && $action == "edit") action="{{ route('admin.updatetask',['taskId' => $task->id]) }}"  @else action="{{ route('admin.createtask',['userId' => $userId]) }}"  @endif >

                    @csrf

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="@if(!empty($task)) {{ $task->title }} @endif">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                    <div class="col-md-6">
                        <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="@if(!empty($task)) {{ $task->description }} @endif">

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>

                    <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        @if(!empty($action) &&  $action == "edit")
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button> 
                            @else
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
                            </button> 
                        @endif
                    </div>
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
