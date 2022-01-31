@extends('layouts.main')

@section('title','SMK Taruna Bhakti')

@section('content')
    <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Data Tamu SMK Taruna Bhakti</h5>
                            
                            <form action="{{route('datastore')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="namatamu">Nama Tamu</label>
                                    <input type="text" class="form-control @error('namatamu') is-invalid @enderror" id="namatamu" name="namatamu"  value="{{old('namatamu')}}" required>
                                    <small id="namatamu" class="form-text text-muted">Nama tamu yang berkunjung</small>

                                    @error('namatamu')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi" required>
                                    <small id="instansi" class="form-text text-muted">Instansi Tamu yang berkunjung</small>
                                    @error('instansi')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="5" name="alamat" value="{{old('alamat')}}" required></textarea>
                                    @error('alamat')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto</label>
                                    <div class="col-md-6">
                                        <div id="camera"></div>
                                        <br/>
                                        <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                                        <input type="hidden" name="image" class="image-tag">
                                    </div>
                                    <div class="col-md-6">
                                        <div id="results" style="margin-top: 30px;">Your captured image will appear here...</div>
                                    </div>
                                    
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            Data Harus diisi!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tandaTangan">Tanda Tangan</label>
                                    <div class="col-md-12">
                                        <label class="" for="">Tanda Tangan:</label>
                                        <br/>
                                        <canvas id="sig" class="shadow"></canvas>
                                        <br/>
                                        <button id="clear" class="btn btn-primary mt-3" type="button">Hapus Tanda Tangan</button>
                                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                                    </div>

                                </div>
                                <button class="btn btn-primary" type="submit" id="simpanEdit123">Simpan</button>
                                <a class="btn btn-secondary" href="/bukutamu">Back</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    

@endsection

