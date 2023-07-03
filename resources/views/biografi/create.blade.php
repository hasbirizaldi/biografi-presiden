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
            <div class="card border-0 shadow-sm rounded p-4 ">
              <h2 class="text-center">Tambah Data</h2>
                <div class="card-body">
                    <form action="{{ route('presiden.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group mb-3">
                          <label class="font-weight-bold">Nama Tokoh</label>
                          <input type="text" class="form-control @error('nama_tokoh') is-invalid @enderror" name="nama_tokoh" value="{{ old('nama_tokoh') }}" placeholder="Masukkan Masukan nama tokoh...">
                      
                          @error('nama_tokoh')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Foto</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        
                          @error('image')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        {{-- <div class="form-group mb-3">
                          <label class="font-weight-bold">Orientasi</label>
                          <input type="text" class="form-control @error('orientasi') is-invalid @enderror" name="orientasi" value="{{ old('orientasi') }}" placeholder="Masukkan Masukan nama tokoh...">
                      
                          @error('orientasi')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group mb-3">
                        <label class="font-weight-bold">Peristiwa Penting</label>
                        <input type="text" class="form-control @error('peristiwa_penting') is-invalid @enderror" name="peristiwa_penting" value="{{ old('peristiwa_penting') }}" placeholder="Masukkan Masukan nama tokoh...">
                    
                        @error('peristiwa_penting')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                      <label class="font-weight-bold">Reorientasi</label>
                      <input type="text" class="form-control @error('reorientasi') is-invalid @enderror" name="reorientasi" value="{{ old('reorientasi') }}" placeholder="Masukkan Masukan nama tokoh...">
                  
                      @error('reorientasi')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div> --}}

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Orientasi</label>
                            <textarea class="form-control @error('orientasi') is-invalid @enderror" name="orientasi" rows="5" placeholder="Masukkan Konten Post">{{ old('orientasi') }}</textarea>
                        
                          @error('orientasi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group mb-3">
                          <label class="font-weight-bold">Peristiwa Penting</label>
                          <textarea class="form-control @error('peristiwa_penting') is-invalid @enderror" name="peristiwa_penting" rows="5" placeholder="Masukkan Konten Post">{{ old('peristiwa_penting') }}</textarea>
                      
                        @error('peristiwa_penting')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>

                      <div class="form-group mb-3">
                        <label class="font-weight-bold">Reorientasi</label>
                        <textarea class="form-control @error('reorientasi') is-invalid @enderror" name="reorientasi" rows="5" placeholder="Masukkan Konten Post">{{ old('reorientasi') }}</textarea>
                    
                      @error('reorientasi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                        <button type="submit" class="btn btn-md btn-primary">Tambah</button>
                        <button type="reset" class="btn btn-md btn-secondary">Reset</button>

                    </form> 
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