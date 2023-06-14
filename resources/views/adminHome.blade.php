@extends('layouts.app')
  
@section('content')
<div class="container"> 

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Last Login</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if ($users->isEmpty())
                <tr><td>No users found.</td></tr>
            @else
                @foreach ($users as $user)
                    <tr> 
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->last_login }}</td>
                    <td @if($user->status == "enable") style="color:green" @else style="color:red" @endif>{{ ucfirst($user->status) }}</td>
                    <td> 
                        <a href="{{ route('admin.task', ['userId' => $user->id]) }}">Create Task</a> |
                        <a href="{{ route('admin.usertasks', ['userId' => $user->id]) }}">Show Tasks</a> 
                    </td>
                    </tr> 
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
