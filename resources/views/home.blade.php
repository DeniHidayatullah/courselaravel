@extends('Layout/isGuest')

@section('content')
<div class="card-header">
    <h3>{{$title}}</h3>
  </div>
            <div class="row">
                @foreach ($articles as $articles)
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">{{$articles->title}}</h5>
                        <small class="text-muted">{{$articles->tag}}</small>
                        <br>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
@endsection