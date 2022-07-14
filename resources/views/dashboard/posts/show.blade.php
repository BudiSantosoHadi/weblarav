@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="my-3">{{ $post->title }}</h1>

        <a class="btn btn-success" href="/dashboard/posts"><span class="mb-1" data-feather="chevron-left"></span>Back to all my posts</a>
        <a class="btn btn-warning" href="/dashboard/posts/{{ $post->slug }}/edit"><span class="mb-1" data-feather="edit"></span>edit</a>
        {{-- <a class="btn btn-danger" href=""><span data-feather="x-circle"></span>Delete</a> --}}
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
             @csrf
             <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span class="mb-1" data-feather="x-circle"></span>Delete</button>
         </form>

         @if ($post->image)
         <div class="" style="overflow:hidden ">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
        </div>
         @else
         <img src="https://source.unsplash.com/random/1200×400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
         @endif

       <article class="my-3 fs-5">
        {!!  $post->body  !!}
        {{-- artinya tidak melakukan escaping --}}
        {{-- jadi kalau ada tag html sama dia di escape  --}}
       </article>
   {{-- <a href="/posts" class="d-block mt-5">Back to Post</a></p> --}}
        </div>
    </div>
</div>
@endsection
