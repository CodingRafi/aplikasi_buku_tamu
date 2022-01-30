<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    
  
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <style>

    .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }

    </style>

    <title>SMK Taruna Bhakti</title>
  </head>
  <body style="background: #2196F3">

    <nav class="navbar navbar-expand-lg navbar-light " style="background: #fff">
        <div class="container">
          <a class="navbar-brand" href="/">
              <img src="https://bukutamu.millenialsproject.com/image/SmkTarunaBhakti.jpg" alt="" style="height: 5vh">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

      <div class="container d-flex justify-content-center align-items-center">
          <div class="container">
              <div class="card mt-5">
                <div class="card-body">
                    <form action="{{route('tambahtamu')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="namatamu">Nama Tamu</label>
                            <input type="text" class="form-control @error('namatamu') is-invalid @enderror" id="namatamu" name="namatamu"  value="{{old('namatamu')}}">
                            <small id="namatamu" class="form-text text-muted">Nama tamu yang berkunjung</small>
    
                            @error('namatamu')
                                <div class="alert alert-danger" role="alert">
                                    Data Harus diisi!
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi">
                            <small id="instansi" class="form-text text-muted">Instansi Tamu yang berkunjung</small>
                            @error('instansi')
                                <div class="alert alert-danger" role="alert">
                                    Data Harus diisi!
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="5" name="alamat" value="{{old('alamat')}}"></textarea>
                            <small id="namatamu" class="form-text text-muted">Alamat tamu yang berkunjung</small>
                            @error('alamat')
                                <div class="alert alert-danger" role="alert">
                                    Data Harus diisi!
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Foto</label>
                            <div id="camera" class="img-fluid"></div>
                            <br/>
                            <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                            <div id="results">Your captured image will appear here...</div>
                            
                            @error('image')
                                <div class="alert alert-danger" role="alert">
                                    Data Harus diisi!
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tandaTangan">Tanda Tangan</label>
                            <div class="col-md-12">
                                <br/>
                                <canvas id="sig" class="shadow"></canvas>
                                <br/>
                                <button id="clear" class="btn btn-primary mt-2" type="button">Hapus Tanda Tangan</button>
                                <textarea id="signature64" name="signed" style="display: none"></textarea>
                            </div>
    
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit" id="simpanEdit123">Simpan</button>
                            <a href="/" class="btn btn-danger" type="submit">Back</a>
                        </div>
                    </form>
                </div>
              </div>
          </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
{{-- 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
    <script>
        Webcam.set({
                width: 350,
                height: 250,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#camera');
            function take_snapshot() {
                Webcam.snap( function(data_uri) {
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'" class="img-fluid mt-4"/>';
                } );
            }

            let signature;

            function setupSignature(){
                const canvas = document.querySelector('canvas');
                signature = new SignaturePad(canvas);
            }

            $(document).ready(setupSignature)

            $('#clear').click(function() {
            signature.clear()
            $('#signature64').val('');
            console.log($('#signature64').val())
            });

            $('#simpanEdit123').click(function(){
                let ttd = signature.toDataURL();
                let data = $('#signature64').val(ttd)
                console.log($('#signature64').val())

            })

        // var canvas = document.getElementById('signature-pad');
        // var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        // $('#clear').click(function(e) {
        //     e.preventDefault();
        //     sig.signature('clear');
        //     $("#signature64").val('');
        // });


    </script>
  </body>
</html>