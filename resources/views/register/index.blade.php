
    {{-- <link href="assets/css/regis.css" rel="stylesheet"> --}}

{{--

<body class="text-center">

<main class="form-signin w-100 m-auto">

<h1 class="h3 mb-3 fw-normal">Halaman Registrasi</h1>

<form action="" method="post">

  <div class="form-floating">
      <input class="form-control" type="text" name="username" id="username" required autocomplete="off">
          <label for="username"> Username : </label>
  </div>
  <br>
   <div class="form-floating">
         <input class="form-control" type="password" name="password" id="password" required autocomplete="off">
         <label for="password"> Password : </label>
   </div>
<br>

          <!-- <input type="password" name="password2" id="password2">
          <label for="password2"> Konfirmasi Password : </label> -->
          <button type="submit" name="register" class="w-30 btn  btn-primary">Sign In!</button>

</form> --}}
{{-- </main> --}}

@extends('layouts.main')

@section('container')
<div class="row justify-content-center" style="background-color:wheat">
    <div class="col-md-5">
        <main class="form-registration">

              {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
              <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
              <form action="\register" method="POST">
                @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid
                @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                {{-- di dalam value itu buat kalau salah tidak ulang lagi ngisi dari awal --}}
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid
                @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
              @error('username')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
            </div>
              @enderror
              <div class="form-floating">
                <input type="email" name="email" class="form-control control @error('email') is-invalid
                @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid
                @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
              {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> --}}
            </form>
            <small class="d-block text-center mt-3">Already registered?
                 <a href="/login">Login</a>
            </small>
          </main>
    </div>
</div>


@endsection



