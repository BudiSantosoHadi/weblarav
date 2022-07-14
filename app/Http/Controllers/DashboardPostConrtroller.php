<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostConrtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function     create() // untuk menampilkan view create nya
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // untuk proses data create nya
    {
        // return $request->file('image')->store('post-images');
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', //di kasih uniq di table posts // untuk menjaga user untuk mengupdate slugnya manual
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);
        // jika mengupload gambar lakukan ini // jika ada gambar yg di upload
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
            // cara bacanya => kalau request dari file yang namanya image itu ada isinya (kalau kosong null kalau null berarti false) , kalau true
            // $validatedData diisi dengan image, di isi dengan upload gambar nya sekali gus ambil nama gambar nya
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200) ; //buat batasan kalimat excerpt nya // dan gunanya strip_tags adalah supaya menghulangkan tag html nya

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('succes', 'successfully added data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) // untuk menampilkan view editnya
    {

        if($post->author->id !== auth()->user()->id) { //supaya kita tidak bisa melihat dan mengubah post author lain
            abort(403);
       }
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) // untuk proses data edit nya
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]; // jika tidak ingin mengubah slug nya ... karna kalau masih ada uniqe atau belum lakukan seperti ini maka tidak akan bisa di edit karna slug nya tidak kita ubah karna dia unique...


        if($post->author->id !== auth()->user()->id) { //supaya kita tidak bisa melihat dan mengubah post author lain
            abort(403);
       }
        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts'; // jika request slug itu tidak sama dengan post slug baru kita validasi yang tadi , kita timpa dengan variable rules jadi rules yang key nya slug itu di isi dengan required uniq posts , // jika kita mengubah slug nya
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage); // ini untuk menghapus image lama
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
            // cara bacanya => kalau request dari file yang namanya image itu ada isinya (kalau kosong null kalau null berarti false) , kalau true
            // $validatedData diisi dengan image, di isi dengan upload gambar nya sekali gus ambil nama gambar nya
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200) ; //buat batasan kalimat excerpt nya // dan gunanya strip_tags adalah supaya menghulangkan tag html nya

        Post::where('id', $post->id)
        ->update($validatedData);

        return redirect('/dashboard/posts')->with('succes', 'successfully Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image); // ini untuk menghapus image lama
        } // delete file gambar
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('succes', 'successfully delete data');
    }// delete table 

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
