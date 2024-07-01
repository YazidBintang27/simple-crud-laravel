<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      body {
        font-family: "Poppins", sans-serif;
        font-size: 14px
      }
    </style>
  </head>
  <body class="bg-light">
    <nav>
        <nav class="navbar bg-primary">
            <div class="container-fluid ms-3">
              <a class="navbar-brand fw-semibold text-light" href="{{url('mahasiswa')}}">
                <img src="{{asset('images/Logo-UMT-Universitas-Muhammadiyah-Tangerang-Original.png')}}" alt="Logo" width="60" height="60" class="d-inline-block align-text-center mx-2">
                Data Mahasiswa
              </a>
            </div>
          </nav>
    </nav>
    <main class="container">
      @include('components.message')
      @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>