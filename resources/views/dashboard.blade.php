@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h2>Dashboard</h2>
    <div class="sidebar">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('manage.users') }}">Manage Users</a>
        @endif
        @if (Auth::user()->role == 'user')
            <a href="{{ route('my.tasks') }}">My Tasks</a>
        @endif
    </div>
    <div class="content">
        <p>Welcome to your dashboard, {{ Auth::user()->name }}!</p>
    </div>
</div>
@endsection

