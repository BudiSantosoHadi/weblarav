<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    public function index()
    {

        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' .$category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' .$author->name;
        }
     // kita akan cek kalau ada sesuatu ada yang di tulis di kolom search, kita akan tambah kan query ke dalam latest(),
        return view('posts ', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            // dibawah ini cara bacanya = saya mau ambil dari model sebauh method alla yang berfungsi untuk mengambil semua data postingan
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()// ini memakai yang di pelajari di eager loading dengan menggunakan with

    ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            // ngirimin data title dari halamannya
          "title" => "Single Post",
          "active" => 'posts',
          "post" => $post

      ]);
    }
}
