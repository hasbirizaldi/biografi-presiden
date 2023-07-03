<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presidents</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  </head>
  <body >
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
    <div class="container mt-2" style="border: 10px solid red">
        <h1 class="text-center mb-3">Biografi Presiden</h1>
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('presiden.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="col-md-4">
              <form method="GET">
                <div class="input-group mb-3">
                  <input 
                    type="text" 
                    name="search" 
                    value="{{ request()->get('search') }}" 
                    class="form-control" 
                    placeholder="Search..." 
                    aria-label="Search" 
                    aria-describedby="button-addon2">
                  <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
            </div>
        </div>
      
        <table class="table table-striped table-hover table-bordered mt-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Tokoh</th>
                <th scope="col">Foto</th>
                <th scope="col">Orientasi</th>
                <th scope="col">Peristiwa Penting</th>
                <th scope="col">Reorientasi</th>
                <th width="150" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($presidents as $presiden)
                <tr>
                    <th scope="row">{{ $loop->iteration + $presidents->firstItem() - 1 }}</th>
                    <td>{{ $presiden->nama_tokoh }}</td>
                    <td>
                      <img src="{{ asset('/storage/presidens/'.$presiden->image) }}" width="150" height="200" alt="">
                    </td>
                    <td>{!! $presiden->orientasi !!}</td>
                    <td>{!! $presiden->peristiwa_penting !!}</td>
                    <td>{!! $presiden->reorientasi !!}</td>
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('presiden.destroy', $presiden->id) }}" method="POST">
                        <a href="{{ route('presiden.show', $presiden->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('presiden.edit', $presiden->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    </td>
                  </tr>
                @empty
                    
                @endforelse
              
            </tbody>
          </table>
          <div class="mt-3">
            {{ $presidents->links() }}
          </div>
    </div>
    {{-- Kontent --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7caf5d91f7.js" crossorigin="anonymous"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
    
  </body>
</html>