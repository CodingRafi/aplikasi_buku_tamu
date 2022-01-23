@extends('layouts.main')

@section('title','SMK Taruna Bhakti')

@section('content')
    <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Data Tamu SMK Taruna Bhakti</h5>
                            
                            <form action="{{route('dataupdate',$datatamu->id)}}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="namatamu">Nama Tamu</label>
                                    <input type="text" value="{{$datatamu->nama}}" class="form-control @error('namatamu') is-invalid @enderror" id="namatamu" name="namatamu" >
                                    <small id="nama tamu" class="form-text text-muted">Nama tamu yang berkunjung</small>

                                    @error('namatamu')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="instansi">Instansi</label>
                                <input type="text" value="{{$datatamu->instansi}}" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi">
                                    <small id="instansi" class="form-text text-muted">Instansi Tamu yang berkunjung</small>
                                    @error('instansi')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="5" name="alamat" >{{$datatamu->alamat}} </textarea>
                                    @error('alamat')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group" id="gambarEdit2">
                                    <label for="suhutubuh">Foto</label>
                                    <div class="input-group mb-2">
                                        <img src="/storage/{{ $datatamu->image }}" alt="" class="imgEdit">
                                        
                                        @error('suhutubuh')
                                        <div class="alert alert-danger float-none" role="alert">
                                            Data Harus diisi!
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="button" class="ubahFoto btn btn-primary">Ubah Foto</button>
                                    <div class="container-fluid mt-3 p-0">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    
@endsection

