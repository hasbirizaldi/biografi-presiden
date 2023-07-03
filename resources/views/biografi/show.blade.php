<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presidents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">President Indonesia</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    {{-- Navbar --}}
    {{-- Kontent --}}
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-11 bg-danger p-3">
            <div class="card border-0 shadow-sm rounded p-4 w-80">
              <h2 class="text-center">Biografi {{ $presiden->nama_tokoh }}</h2>
                <div class="card-body">
                  <div class="d-flex justify-content-center">
                    <img src="{{ asset('/storage/presidens/'.$presiden->image) }}" alt="{{ $presiden->nama_tokoh }}" width="250" height="300" class="rounded "><br>
                  </div>
                  <h3 class="text-center mb-3">{{ $presiden->nama_tokoh }}</h3>
                  <ul>
                    <li>
                      <h5>Orientasi</h5>
                      <p>{!! $presiden->orientasi !!}</p>
                    </li>
                    <li>
                      <h5>Peristiwa Penting</h5>
                      <p>{!! $presiden->peristiwa_penting !!}</p>
                    </li>
                    <li>
                      <h5>Reorientasi</h5>
                      <p>{!! $presiden->reorientasi !!}</p>
                    </li>
                  </ul>
                  <a href="{{ route('presiden.index') }}" class="btn btn-sm btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>
      

    {{-- Kontent --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      CKEDITOR.replace( 'orientasi' );
  </script>
    <script>
      CKEDITOR.replace( 'peristiwa_penting' );
  </script>
    <script>
      CKEDITOR.replace( 'reorientasi' );
  </script>


  </body>
</html>