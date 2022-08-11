@extends('Layout/isUser')

@section('content')
{{-- {{ dd($users->token) }} --}}
    <h3>{{ $title }}</h3>
    <form method="POST" action={{ route('dashboard_logout') }}>
    @csrf
        <input name="token" type="hidden" value={{ ($users->token) }}/>
        <button>Logout</button> 
    </form>
@endsection