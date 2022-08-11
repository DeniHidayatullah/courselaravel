@extends('Layout/isGuest')

@section('content')
<div>
  <h3>Login Page</h3>
  <i>{{ session()->get('error') }}</i>
  <form  method="POST" action={{ route ('login_action')}}>
    @csrf
    <input name="username" placeholder="Masukan Username"/>
    <input name="password" placeholder="Masukan Password"/>
    <button type="submit">Login</button>
  </form>
</div>
@endsection