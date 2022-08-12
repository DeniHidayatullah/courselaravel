@extends('Layout/isUser')

@section('content')

<div class="container">
    {{-- {{ dd($users->token) }} --}}
    <h3>{{ $title }}</h3>
    <div>
        <form method="POST" action={{ route('dashboard_logout') }} class="py-2">
            @csrf
            <input class="form-control" name="token" type="hidden" value={{ $users->token }} />
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
    {{ session()->get('message') }}
    <div class="py-2">
        <form method="POST" action={{ route('article_add_action') }}>
            @csrf
            <input class="form-control mt-2" type="text" placeholder="judul" name="title" />
            <input class="form-control mt-2" type="text" placeholder="deskripsi" name="description" />
            <input class="form-control mt-2" type="text" placeholder="tag" name="tag" />
            <button class="btn btn-primary my-4" type="submit">Buat Artikel</button>
        </form>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>tag</th>
            <th>action</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->description }}</td>
                <td>{{ $article->tag }}</td>
                <td>
                    <div>
                        <a href="" class="btn btn-link">edit</a>
                        <form method="POST" action={{ route('article_delete_action') }}>
                            @csrf
                            <input class="form-control" type="hidden" name="id" value={{ $article->id }} />
                            <button class="btn btn-link" type="submit">hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection