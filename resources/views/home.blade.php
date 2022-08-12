@extends('Layout/isGuest')

@section('content')
    <h3>{{$title}}</h3>
    <div>
        @foreach ($articles as $articles)
            <div>
                <h3>{{ $articles->title  }}</h3>
            </div>
            <hr/>
        @endforeach
    </div>
@endsection