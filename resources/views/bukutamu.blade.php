@extends('layouts.main')

@section('title','SMK Taruna Bhakti')

@section('content')

    <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a href="{{route('formcreate')}}" class="btn btn-primary" he> <i class="fa fa-edit mr-1"></i>Tambah Data</a>
                    @if (session('notif'))
                        <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                            {{session('notif')}}
                        </div>
                    @endif
                    @if (session('notifdelete'))
                        <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                            {{session('notifdelete')}}
                        </div>
                    @endif
                    <table class="table mt-3 table-striped" style="font-size: 15px;text-align:center;">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama Tamu</th>
                                <th>Instansi</th>
                                <th>Alamat</th>
                                <th>Tanda Tangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datatamu as $no=> $dt)
                            <tr>
                                <input type="hidden" value="{{ $dt->nama }}" class="key{{ $no }}">
                                <input type="hidden" value="{{ $dt->instansi }}" class="key{{ $no }}">
                                <input type="hidden" value="{{ $dt->alamat }}" class="key{{ $no }}">
                                <input type="hidden" value="{{ $dt->tandatangan }}" class="key{{ $no }}">
                                <input type="hidden" value="{{ $dt->image }}" class="key{{ $no }}">
                                <td>{{$datatamu->firstItem()+$no}}</td>
                                <td><img src="storage/{{$dt->image}}" style="width: 30px;"></td>
                                <td>{{$dt->nama}}</td>
                                <td>{{$dt->instansi}}</td>
                                <td>{{$dt->alamat}}</td>
                                <td><img src="tandaTangan/{{ $dt->tandatangan }}" style="width: 90px;"></td>
                                <td>
                                    <div class="container d-flex" style="width: 5vw;margin: 0;padding: 0;">
                                        <button type="button" class="badge badge-primary border-0 butModal" data-toggle="modal" data-target="#exampleModal" data-id="{{ $no }}">
                                            See
                                        </button>
                                        <a href="{{route('dataedit',$dt->id)}}" class="badge badge-warning" style="height: 18px;margin: 0 10px;margin-top: 3px;">Edit</a>
                                        <form action="{{route('datadelete',$dt->id)}}" id="delete{{$dt->id}}" method="POST" class="d-block">
                                            @csrf
                                            @method('delete')
                                            <a href="#" data-id={{$dt->id}} class="badge badge-danger swal-confrim">
                                                Hapus  
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    

                    

                    {{$datatamu->links()}}
                    
                </div>
            </div>
    </div>

    
@endsection


@push('after-script')
<script>
        $(".swal-confrim").click(function(e) {
            id = e.target.dataset.id;
            Swal.fire({
            title: 'Apakah anda yakin ingin hapus data ini?',
            text: "Data yang terhapus tidak dapat dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            
            }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire(
                // // 'Deleted!',
                // // 'Your file has been deleted.',
                // // 'success',
                // )
                $(`#delete${id}`).submit();
            }else{
                
            }
            
            })
            
    });
</script>
@endpush