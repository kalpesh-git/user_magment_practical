@extends('layouts.app')
  
@section('content') 
<div class="container">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body"> 
            <p class="card-text">First Name: {{ $user->first_name }}</p>
            <p class="card-text">Last Name: {{ $user->last_name }}</p> 
            <p class="card-text">Last Login: {{ $user->last_login}}</p> 
            <p class="card-text">
                Status: <span @if($user->status == "enable") style="color:green;" @else style="color:red;" @endif >{{ ucfirst($user->status) }}</span>
            </p>
            <p class="card-text">
                <a href="{{ route('user.tasks') }}">Show Task List</a> 
            </p>
        </div>
    </div>
</div>

@endsection