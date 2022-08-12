@extends('Layout/isGuest')

@section('content')
    <h3>{{$title}}</h3>
    <div>
      <h3>{{$article->title}}</h3>
      <p>{{$article->description}}</p>
      <i>{{$article->tag}}</i>
    </div>
    <a href="/">kembali<a>
@endsection