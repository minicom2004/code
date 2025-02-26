
    @extends('admin.layouts')

    @section('content')


        <body>
            <h1>List Cart</h1>


            <div class="container mt-5">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Movie Name </th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Poster</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $key)
                            <tr>
                                <td>{{ $key->id }}</td>
                                <td>{{ $key->fullname }}</td>
                                <td>{{ $key->title }}</td>
                                <td>{{ $key->quantity }}</td>
                                <td><img src="{{ asset('storage/' . $key->poster) }}" alt="Movie Poster" width="100"></td>
                                <td>{{ $key->price }}</td>
                                <td>{{ $key->total_price }}</td>

                                <td>
                                    <form action="{{ route('CartUser.cart.destroy', $key->id) }}" method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa carts này không?');">
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



