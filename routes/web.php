<?php


// use App\Models\Post;
// use App\Models\User;

// use App\Http\Controllers\DashboardController_histori;

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostConrtroller;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "home" ,//buat title nya supaya auto berubah rubah
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "active" => "about",
        "name" => "Raihan hamdani",
        "email" => "rey@gmail.com",
        "image" => "Diluc.png"
    ]);
});

// DIBAWAH INI MEMAKAI CONTROLLER SEDANGKAN DI ATAS INI MEMAKAI CLOSSURE

Route::get('/posts', [PostController::class, 'index']);

// Halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);


// TAMPILAN KATEGORI di web
Route::get('/categories', function() {
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all() // nanti dia ambil dari model Category
    ]);
});

// tampilan buat login

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //dan yang name login itu kita mengasih nama di route nya dengan nama login jadi tidak bergantungan dengan url
// jadi kita kasih tau ini hanya bisa di akses oleh user yang belum terautentikasi
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, 'index'])->middleware('guest'); // karna yang hanya bisa mengakses halaman register hanya guest
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth'); // karna yang boleh mengakses halaman dashboard hannya akun yg sudah login
// MEMAKAI MODEL CLOSSURE JADI TIDAK MEMAKAI CONTROLLER


Route::get('/dashboard/posts/checkSlug', [DashboardPostConrtroller::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts',DashboardPostConrtroller ::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin'); //kita cegah di controllernya di admin

// ini buat nampilkan categories

// kita buat route baru yang akan mengarah ke categories, baru dia mengambil category nya, kita langsung terapkan route model binding
// Route::get('/categories/{category:slug}', function(Category $category)
// {
//    return view('posts',[
//     'title' => "Post by Category $category->name",
//     "active" => 'posts',
//     'posts' => $category->posts->load('category' ,'author')
//     // semua postingannya ya yang merupakan bagian dari kategori itu , ini dari kebalikannya dari post tadi

//    ]);
// });

// KARNA SUDAH DI TANGANI oleh query kita di model di line 28

// Route::get('/authors/{author:username}', function(User $author ) {
//     return view('posts',[
//         'title' => "Post By Uthor : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author') // dengan menggunakan lazy eager loading
//         // semua postingannya ya yang merupakan bagian dari kategori itu , ini dari kebalikannya dari post tadi
//        ]);
// });
// sebelum pelajaran 13 menit 47 ini masih pakek
