@extends('admin.layouts')

@section('title', 'Chỉnh sửa phim')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa phim</h1>
        <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Tiêu đề phim</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $movie->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="poster">Hình ảnh áp phích</label>
                <input type="file" name="poster" id="poster" class="form-control">
                @if($movie->poster)
                    <img src="{{ asset($movie->poster) }}" width="100" alt="">
                @endif
                @error('poster')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="intro">Giới thiệu phim</label>
                <textarea name="intro" id="intro" class="form-control">{{ $movie->intro }}</textarea>
                @error('intro')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="release_date">Ngày công chiếu</label>
                <input type="date" name="release_date" id="release_date" class="form-control" value="{{ $movie->release_date }}">
                @error('release_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="genre_id" class="form-label">Thể loại</label>
                <select name="genre_id" id="genre_id" class="form-control">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật phim</button>
          
        </form>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-primary mt-3">Quay lại danh sách</a>
    </div>
@endsection

