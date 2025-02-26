@extends('admin.layouts')

@section('title', 'Thêm phim mới')

@section('content')
    <div class="container">
        <h1>Thêm phim mới</h1>
        <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Tiêu đề phim</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="form-control
                @error('title') is-invalid
                    
                @enderror
                ">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="poster">Hình ảnh áp phích</label>
                <input type="file" name="poster" id="poster" class="form-control">
                @error('poster')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="intro">Giới thiệu phim</label>
                <textarea name="intro" id="intro" value="{{ old('intro') }}"
                    class="form-control
                @error('intro') is-invalid
                    
                @enderror
                "></textarea>
                @error('intro')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="release_date">Ngày công chiếu</label>
                <input type="date" name="release_date" id="release_date" value="{{ old('relaase_date') }}"
                    class="form-control">
                @error('release_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="genre_id" class="form-label">Thể loại</label>
                <select name="genre_id" id="genre_id" class="form-control">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }} @if (old('genre_id') == $genre->id) selected @endif">
                            {{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm phim</button>
        </form>
    </div>
@endsection
