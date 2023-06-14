@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Tasks') }}</div>

                <div class="card-body">
                    @if ($tasks->count() > 0)
                        <ul class="list-group">
                            @foreach ($tasks as $task)
                                <li class="list-group-item">{{ $task->title }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tasks found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
