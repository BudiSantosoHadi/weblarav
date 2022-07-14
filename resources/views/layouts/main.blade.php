<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    {{-- Bootstraps icons --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

   {{-- my Styles --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/"> --}}
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">



  <!-- Custom styles for this template -->
     <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <title> {{ $title }} </title>
  </head>
  <body class="bg-light" >
{{-- di halaman ini navbar nya di ambil di pindah kan ke file navbar blade lalu di halaman ini kita kasih tau dengan mengguanakan tag include  bahwa disini akan tersimpan sebuah navbar--}}
@include('partials.navbar')

    <div class="container mt-4" >
        @yield('container')
        {{-- jadi halaman utama yang akan berisii apapun yang di dalam container --}}
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
