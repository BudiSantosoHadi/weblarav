@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
        {{-- enctype ini harus ada kalau ingin nanti menggunakan upload file/gambar // Sehingga form ini menangani 2 hal yang pertama semua inputan dalam bentuk text akan di ambil dengan request biasa , yang kedua kalau ada file akan di ambil dengan request file // kalau gak ini file kita tidak akan bisa di upload --}}
        {{-- actionnya di gabungkan dengan method post itu akan mengarah ke file DashboardPostController yang methodnya store udah automatis kalau kita pakai resources --}}
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid
          @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
          @error('title')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control
            @error('slug') is-invalid  @enderror" id="slug"
            name="slug" readonly required value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">category</label>
            <select class="form-select" name="category_id">
                @foreach ( $categories as $category )
                @if (old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                 @else
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endif

                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <img class="img-preview img-fluid mt-2 mb-3 col-sm-4">
            <input class="form-control @error('image') is-invalid  @enderror" type="file" id="image" name="image" accept="image/*" onchange="previewImage()">
            @error('image')
            <div class ="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-4">
            <label class="mt-2" for="body" class="form-label">Body</label>
            @error('body')
              <p class="text-danger">{{ $message }}</p>
            @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
          </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
  </div>


  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    // ini UNTUK supaya kalau kita isi di title nya maka si slug juga ikutan apabila kita tab atau tidak

    title.addEventListener('change', function() {
       fetch('/dashboard/posts/checkSlug?title=' + title.value)
       .then(response => response.json())
       .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

// buat nampilin gambar
    function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
    }

  </script>
@endsection
