@extends('admin.layouts')

@section('title', 'Chi tiết phim')

@section('content')
    <div class="container">
        <h1>Chi tiết phim</h1>
        <div class="card">
            <div class="card-header">
                {{ $movie->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Thể loại: {{ $movie->genre->name }}</h5>
                <p class="card-text">Giới thiệu: {{ $movie->intro }}</p>
                <p class="card-text">Ngày công chiếu: {{ $movie->release_date }}</p><br>
                @if($movie->poster)
                    <img src="{{ asset('storage/' . $movie->poster) }}" class="img-fluid" alt="Poster">
                @endif
                <br>
                <a href="{{ route('admin.movies.index') }}" class="btn btn-primary mt-3">Quay lại danh sách</a>
                <a href="{{ route('admin.movies.home') }}" class="btn btn-primary mt-3">Quay lại Trang Chủ</a>
            </div>
        </div>
    </div>
@endsection
