<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartUserController extends Controller
{

    public function listCart()
    {
        // Lấy dữ liệu từ bảng carts, users và movies bằng phép nối (join)
        $carts = DB::table('carts')
            ->join('users', 'carts.user_id', '=', 'users.id') // Liên kết cột user_id từ bảng carts với cột id từ bảng users
            ->join('movies', 'carts.movie_id', '=', 'movies.id') // Liên kết cột movie_id từ bảng carts với cột id từ bảng movies
            ->select('carts.*', 'users.fullname', 'movies.title', 'movies.poster', DB::raw('carts.quantity * carts.price as total_price')) // Tính tổng giá
            ->orderBy('movies.id', 'desc') // Sắp xếp theo id của movies giảm dần
            ->get();

        return view('cartUser.cart.listCart', compact('carts'));
    }

    public function create()
    {
        $users = DB::table('users')->select('id', 'fullname')->get();
        $movies = DB::table('movies')->select('id', 'title', 'poster')->get();

        return view('cartUser.cart.create', compact('users', 'movies'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'movie_id' => 'required|exists:movies,id',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        DB::table('carts')->insert([
            'user_id' => $validated['user_id'],
            'movie_id' => $validated['movie_id'],
            'quantity' => $validated['quantity'],
            'price' => $validated['price'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('CartUser.cart.listCart')->with('success', 'Cart created successfully!');
    }
    public function destroy($id)
    {
        Cart::find($id)->delete();
        return redirect()->route('CartUser.cart.listCart')->with('success', 'Cart Delete Successfully!');
    }
    public function showCart()
    {
        // Truy vấn bảng users và giỏ hàng (carts)
        $cartItems = DB::table('carts')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->select('users.fullname', 'carts.*')
            ->get();

        // Trả về dữ liệu cho view
        return view('cartUser.cart.showCart', ['cartItems' => $cartItems]);
    }
}
