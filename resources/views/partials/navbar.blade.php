{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
    <a class="navbar-brand" href="/">My Blog</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }} " href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
        {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> --}}
      {{-- </ul>
</div>
  </nav> --}}

  <nav class="navbar navbar-expand-lg bg-light p-3 " style="outline: none" >
    <div class="container-fluid">
        <a style="outline: none" class="navbar-brand" href="/"><span class="" style="font-size:31px; font-weight:600; color: rgb(189, 17, 17)"> P</span>ondok Pesantren<span class="d-flex" style="padding: 0 0 0 20px;">Ainul Yakin</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav d-flex ">
        </ul>
        <ul class="navbar-nav" style="-webkit-margin-start: auto">
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>My dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                    {{-- <a class="dropdown-item" href="/"><i class="bi bi-box-arrow-right"></i>Logout</a></li> --}}
                </form>
            </ul>
          </li>
            @else
            <li style="outline:none;" class="nav-item">
              <a href="/login" style="color: red" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Daftar</a>
            </li>
            @endauth
          </ul>
          {{-- KALAU BELUM LOGIN TAMPILKAN INI --}}

         </div>
      </div>
  </nav>
  <div class="container-fluid">

    <ul class="nav nav-tabs bg-light" style="outline: none" id="myTab" role="tablist">
        <li style="outline:none; margin:0 0 0 80px;" class="nav-item bg-light" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "home") ? 'active' : '' }} " href="/"> Home </a>
        </li>
        <li style="outline:none;" class="nav-item " role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">Profile Pondok</a>
        </li>
        <li style="outline:none;" class="nav-item" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "donasi") ? 'active' : '' }}" href="/donasi">Donasi</a>
        </li>
        <li style="outline:none;" class="nav-item" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "tahfidz") ? 'active' : '' }}" href="/tahfidz">Tahfidz</a>
        </li>
        <li style="outline:none;" class="nav-item" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "terapi") ? 'active' : '' }}" href="/terapi">Terapi</a>
        </li>
        <li style="outline:none;" class="nav-item" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "kewirausahaan") ? 'active' : '' }}" href="/kewira">Kewirausahaan</a>
        </li>
        <li style="outline:none;" class="nav-item" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "konsultasi") ? 'active' : '' }}" href="/konsult">Konsultasi</a>
        </li>
        <li style="outline:none;" class="nav-item" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "zisway") ? 'active' : '' }}" href="/zisway">Zisway</a>
        </li>
        <li style="outline:none;" class="nav-item" role="presentation">
            <a style="color: black; " class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">tentang</a>
        </li>
         </ul>
  </div>
{{--
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Expand at lg</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown05">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav> --}}
