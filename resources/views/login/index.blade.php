@extends('layouts.main')

@section('container')
<div class="row justify-content-center" style="background-color:wheat">
    <div class="col-md-5">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-right: 100px"></button> --}}
          </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-right: 100px"></button> --}}
      </div>
@endif
        <main class="form-signin ">

              {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
              <h1 class="h3 mb-3 fw-normal text-center">Please Log In</h1>
              <form action="/login" method="post">
                @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="paswworrd" placeholder="Password" required>
                <label for="paswworrd">Password</label>
              </div>

              {{-- <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div> --}}
              <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
              {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> --}}
            </form>
            <small class="d-block text-center mt-3">
                Daftar? <a href="/register"> Ayuk daftar dulu...</a>
            </small>
          </main>
    </div>
</div>


@endsection
