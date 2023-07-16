@extends('main')
@section( 'content')

<div class="main-content">
    <div class="container-fluid mt-5">
        <a href="/tambahData" type="button" class="btn btn-success">Tambah</a>
        <div class="row mt-3">
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @else
                
            @endif
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">    
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Penyebab</th>
                                <th scope="col">Solusi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no =1;
                                @endphp
                            @foreach($data as $datas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datas->reject }}</td>
                                <td>{{ $datas->keterangan }}</td>
                                <td>{{ $datas->penyebab }}</td>
                                <td>{{ $datas->solusi }}</td>
                                <td>
                                    <img src="{{ asset('gambarReject/'.$datas->gambar) }}" alt="">
                                </td>
                                <td class="text-center">
                                    <a href="/tampilkanData/{{$datas->id}}" class="btn btn-primary mx-1">Edit</a>
                                    <a href="/deleteData/{{$datas->id}}" class="btn btn-danger">Hapus</a>
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