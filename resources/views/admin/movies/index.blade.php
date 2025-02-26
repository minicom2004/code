@extends('admin.layouts')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách phim</h1>
        <form action="{{ route('admin.movies.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm phim theo tên" value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
        <a href="{{ route('admin.movies.create') }}" class="btn btn-success mb-3">Thêm phim mới</a>
        <a href="{{ route('admin.user.listUser') }}" class="btn btn-success mb-3">User</a>
        <a href="{{ route('CartUser.cart.listCart') }}" class="btn btn-success mb-3">User Cart</a>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Intro</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>
                            @if ($movie->poster)
                                <img src="{{ asset('storage/' . $movie->poster) }}" width="100" alt="Poster của {{ $movie->title }}">
                            @else
                                <span class="text-muted">Không có hình ảnh</span>
                            @endif
                        </td>
                        <td>{{ $movie->intro }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>
                            <a href="{{ route('admin.movies.show', $movie->id) }}" class="btn btn-info">........</a>
                            <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phim này không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
           
        </div>
    </div>
@endsection
