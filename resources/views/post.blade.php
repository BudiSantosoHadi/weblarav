@extends('layouts/main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <p>By,<a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> In <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    {{-- dan setelah a href itu maksudnya adalah apabila kita tekan tombol categori nya maka muncul semua post yang kategori itu --}}
    {{-- maksudnya sama seperti perintah di tinker $post->category terus ambil name nya --}}
    @if ($post->image)
    <div class="" style="overflow:hidden ">
       <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
   </div>
    @else
    <img src="https://source.unsplash.com/random/1200×400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
    @endif

        <article class="my-3 fs-5">
            {!!  $post->body  !!}
            {{-- artinya tidak melakukan escaping --}}
            {{-- jadi kalau ada tag html sama dia di escape  --}}
        </article>
    <a href="/posts" class="d-block mt-5">Back to Post</a></p>
            </div>
        </div>
    </div>





@endsection
