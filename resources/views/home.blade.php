@extends('Layouts.app')

@section('content')
<div>
    <h1 class="mb-5">
        Welcome
        @if (Auth::check())
        {{ Auth::user()->name }}
        @endif
    </h1>

    @if (Auth::check())
    <a href="{{ Auth::logout() }}" class="bg-blue-700 px-5 py-2 rounded text-white">logout</a>
    
    @else
    <a href="{{ route('user.showLoginPage') }}" class="bg-red-500 px-5 py-2 rounded text-white">Log in</a>
    <a href="{{ route('user.showRegisterPage') }}" class="bg-blue-700 px-5 py-2 rounded text-white">Sign up</a>
        
    @endif
</div>

  
@endsection

