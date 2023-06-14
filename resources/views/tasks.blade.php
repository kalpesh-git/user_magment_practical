@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks List') }} @if(!empty($user)) ( {{$user->first_name}} {{$user->last_name}} ) @endif 
                    @if($type === "admin")
                    <a href="{{ route('admin.home') }}">Home</a>
                    @else
                    <a href="{{ route('home') }}">Home</a>
                    @endif
                </div>

                <div class="card-body">
                <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>  
            @if($type === "admin")
                <th scope="col">Action</th>  
            @endif
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @if ($tasks->isEmpty())
            <tr>
                <td>No tasks found.</td>
            </tr>
            @else
                @foreach ($tasks as $index => $task)
                <tr> 
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td> 
                    @if($type === "admin")
                        <td>
                            <a style="color:red;" href="{{ route('admin.taskdelete', ['taskId' => $task->id]) }}">Delete Task</a> |
                            <a style="color:green;" href="{{ route('admin.edittask', ['taskId' => $task->id]) }}">Edit Task</a>
                        </td> 
                    @endif
                </tr> 
                @endforeach
            @endif

        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
