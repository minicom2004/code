<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Recaller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Movie::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $movies = $query->latest()->paginate(8);

        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();

        return view('admin.movies.create', compact('genres'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();

        // Lưu trữ poster nếu có
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters');
        } else {
            $data['poster'] = null;
        }

        Movie::create($data);
        return redirect()->route('admin.movies.index')->with('message', 'Thêm phim thành công');
    }


    public function destroy($id)
    {
        Movie::find($id)->delete();
        return redirect()->route('admin.movies.index')->with('message', 'Xóa phim thành công');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        $genres = Genre::all();

        return view('admin.movies.edit', compact('movie', 'genres'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();

        $movie = Movie::find($id);
        $poster = $movie->poster;

        // Upload new poster if provided
        if ($request->hasFile('poster')) {
            $poster = $request->file('poster')->store('posters');
        }

        $data['poster'] = $poster;
        $movie->update($data);

        return redirect()->back()->with('message', 'Cập nhật phim thành công');
    }



    // list va deleta user 

    public function listUser()
    {

        $user = User::all();
        // dd($user);
        return view('admin.user.listUser', compact('user'));
    }
    public function userDestroy($id)
    {
        // User::find($id)->delete();
        // return redirect()->route('admin.user.listUser')->with('message', 'Xóa user thành công');
        User::find($id)->delete();
        return redirect()->route('admin.user.listUser')->with('message', 'Xoá User Thành Công !');
    }

    public function show($id)
    {
        $movie = Movie::with('genre')->findOrFail($id);
        return view('admin.movies.show', compact('movie'));
    }
  

    public function home()
    {
        // Lấy tất cả dữ liệu từ bảng genres và lấy 6 bản ghi có id lớn nhất
        // $genres = Genre::orderBy('id', 'desc')->take(6)->get();

        // return view('admin.movies.home', compact('genres'));
        $movies = Movie::orderBy('id','desc')->take(6)->get();
        return view('admin.movies.home', compact('movies'));
    }
}
