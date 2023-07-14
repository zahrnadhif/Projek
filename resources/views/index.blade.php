@extends('main')
@section( 'content')

<div class="main-content">
    <div class="container-fluid mt-5">
        <button type="submit" class="btn btn-success">Tambah</button>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">    
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Reject</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Penyebab</th>
                                <th scope="col">Solusi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $datas)
                            <tr>
                                <td>{{ $datas->reject }}</td>
                                <td>{{ $datas->keterangan }}</td>
                                <td>{{ $datas->penyebab }}</td>
                                <td>{{ $datas->solusi }}</td>
                                <td>{{ $datas->gambar }}</td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-primary mx-1">Edit</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                                
                              {{-- @empty --}}
                                  <div class="alert alert-danger">
                                      Data Reject belum Tersedia.
                                  </div>
                              {{-- @endforelse --}}
                            </tbody>
                          </table>  
                          {{-- {{ $blogs->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
</div>
@endsection