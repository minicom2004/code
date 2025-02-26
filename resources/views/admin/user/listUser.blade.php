
    @extends('admin.layouts')

    @section('content')
    <h1>DELETE USER</h1>
        <div class="container mt-5">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">User Name </th>
                        <th scope="col">Email</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Role</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $key)
                        <tr>
                            <td>{{ $key->id }}</td>
                            <td>{{ $key->fullname }}</td>
                            <td>{{ $key->username }}</td>
                            <td>{{ $key->email }}</td>
                            <td>{{ $key->avatar }}</td>
                            <td>{{ $key->role }}</td>
                            <td>{{ $key->active }}</td>
                            <td>
                                <form action="{{ route('admin.user.destroy', $key->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa user này không?');">
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



