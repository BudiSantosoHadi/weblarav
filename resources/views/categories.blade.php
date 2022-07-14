{{-- Dengan menggunakan sebuah directiv milik blade yang bernama @add  --}}
{{-- @dd($posts) --}}


@extends('layouts.main')

@section('container')

<h1 class="mb-5">Post Categories</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category )
        <div class="col-md-4 mb-5">
            <a href="/posts?category={{ $category->slug }}" style="color: white">
              <div class="card bg-dark text-white d-flex">
                     <img src="https://source.unsplash.com/random/500×500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                       <div class="card-img-overlay d-flex align-items-center p-0">
                       <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.473)">{{ $category->name }}</h5>
               </div>
            </a>
              </div>
        </div>

        @endforeach
    </div>
</div>
{{-- looping nya blade --}}
{{-- @foreach ($categories as $category )
<ul>
    <li>
  <h2>
    <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
  </h2>
    </li>
</ul>
@endforeach --}}

@endsection



