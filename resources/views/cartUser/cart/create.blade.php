
    @extends('admin.layouts')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="mt-5">Create Cart</h1>

                    <form action="{{ route('CartUser.cart.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">User Full Name</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="movie_id">Movie Name</label>
                            <select name="movie_id" id="movie_id" class="form-control" required onchange="showPoster()">
                                <option value="">Select Movie</option>
                                @foreach ($movies as $movie)
                                    <option value="{{ $movie->id }}"
                                        data-poster="{{ asset('storage/' . $movie->poster) }}">{{ $movie->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01"
                                required>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Create Cart</button>
                        </div>
                    </form>

                    <div class="form-group mt-3">
                        <img id="moviePoster" src="" alt="Movie Poster" width="100" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            function showPoster() {
                var select = document.getElementById('movie_id');
                var option = select.options[select.selectedIndex];
                var poster = option.getAttribute('data-poster');
                var img = document.getElementById('moviePoster');

                if (poster) {
                    img.src = poster;
                    img.style.display = 'block';
                } else {
                    img.style.display = 'none';
                }
            }
        </script>
    @endsection

