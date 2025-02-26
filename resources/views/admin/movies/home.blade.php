@extends('admin.layouts')

@section('title', 'Home')

@section('content')
    <div class="container">
       
        <h2>Các thể loại phim</h2>
        <div class="row">
            @foreach ($movies as $key)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">{{ $key->title }}</div>
                        <div class="card-body">
                            <p>ID: {{ $key->id }}</p>
                            <img src="{{ asset('storage/' . $key->poster) }}" class="img-fluid" alt="Poster">
                        </div>
                        <a href="{{ route('admin.movies.show', $key->id) }}" class="btn btn-info">........</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
