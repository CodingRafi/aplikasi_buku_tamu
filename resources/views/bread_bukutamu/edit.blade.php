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
                                
                                <div class="form-group">
                                    <label for="image">Foto</label>
                                    <div class="bungkus" {{ ($datatamu->image) ? "style=display:none" : "style=display:block" }}>
                                        <div class="col-md-6">
                                            <div id="camera"></div>
                                            <br/>
                                            <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                                            <input type="hidden" name="image" class="image-tag">
                                        </div>
                                        <div class="col-md-6">
                                            <div id="results" style="margin-top: 30px;">Your captured image will appear here...</div>
                                        </div>
                                    </div>
                                    <div class="bungkus2" {{ ($datatamu->image) ? "style=display:block" : "style=display:none" }}>
                                        <img src="{{ asset('storage/'.$datatamu->image) }}" style="width: 25vw;">
                                    </div>
                                    <button class="btn btn-warning mt-2 tombol-foto" type="button">Ubah Foto</button>
                                    <button class="btn btn-secondary mt-2 tombol-foto-batal" type="button" style="display: none;">Batal</button>
                                    
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tandaTangan">Tanda Tangan</label>
                                    <div class="containertandatangan" {{ ($datatamu->tandatangan) ? "style=display:none" : "style=display:block" }}>
                                        <div class="col-md-12">
                                            <br/>
                                            <canvas id="sig" class="shadow"></canvas>
                                            <br>
                                            <button id="clear" class="btn btn-primary mt-2 mb-2" type="button">Hapus Tanda Tangan</button>
                                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                                        </div>
                                    </div>
                                    <div class="container2tandatangan" {{ ($datatamu->tandatangan) ? "style=display:block" : "style=display:none" }}>
                                        <img src="{{ asset('tandaTangan/'.$datatamu->tandatangan) }}" style="width: 40vw;" class="shadow">
                                    </div>
                                    <button class="btn btn-warning mt-2 tombol-tanda-tangan" type="button">Ubah tanda tangan</button>
                                    <button class="btn btn-secondary mt-2 tombol-tanda-tangan-batal" type="button" style="display: none" >Batal Ubah Tanda Tangan</button>
                                </div>
                                    <div class="container-fluid mt-3 p-0">
                                        <button class="btn btn-primary" id="simpanEdit123">Simpan</button>
                                        <a href="/bukutamu" class="btn btn-secondary">Back</a>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    

    <script>
        const tombolFoto = document.querySelector('.tombol-foto');
        const tombolTandaTangan = document.querySelector('.tombol-tanda-tangan');
        const tombolFotoBatal = document.querySelector('.tombol-foto-batal');
        const bungkus = document.querySelector('.bungkus');
        const bungkus2 = document.querySelector('.bungkus2');
        const results = document.querySelector('#results');
        const imageTag = document.querySelector('.image-tag');
        const containertandatangan = document.querySelector('.containertandatangan');
        const container2tandatangan = document.querySelector('.container2tandatangan');
        const tombolTandaTanganBatal = document.querySelector('.tombol-tanda-tangan-batal');

        tombolFoto.addEventListener('click', function(){
            tombolFotoBatal.style.display = 'block';
            tombolFoto.style.display = 'none';
            bungkus.style.display = 'block';
            bungkus2.style.display = 'none';
        })

        tombolFotoBatal.addEventListener('click', function(){
            bungkus.style.display = 'none';
            bungkus2.style.display = 'block';
            tombolFoto.style.display = 'block';
            tombolFotoBatal.style.display = 'none';
            results.innerHTML = 'Your captured image will appear here...';
            imageTag.value = "";
        })

        tombolTandaTangan.addEventListener('click', function(){
            containertandatangan.style.display =  'block';
            container2tandatangan.style.display = 'none';
            tombolTandaTangan.style.display = 'none';
            tombolTandaTanganBatal.style.display = 'block';
        })

        
    </script>

@endsection

