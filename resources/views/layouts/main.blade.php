    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') {{config('app.name')}}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css"> --}}
    
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/mystyle.css')}}">

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

        body .navbar{
            width: 80%;
        }

        body.sidebar-mini .navbar{
            width: 94%;
        }
    </style>

    {{-- untuk tempat css custom --}}
    @stack('page-style')
    </head>

    <body class="sidebar-mini">
    <div id="app">
        <div class="main-wrapper">
        <div class="navbar-bg"></div>
        
        @include('layouts.header')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
            <div class="section-header" style="margin-top: -65px;">
            <h1>Aplikasi Buku Tamu SMK Taruna Bhakti</h1>
                <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">User ( {{Auth::user()->name}} )</div>
                </div>
            </div>
            
            @yield('content')                  
            
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
            Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="https://smktarunabhakti.net">SMK Taruna Bhakti Depok</a>
            </div>
            
        </footer>
        </div>
    </div> 

    @if (Request::is("bukutamu"))
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;">Detail Pengunjung</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                    <h5 class="card-title" style="font-size: 15px;">Nama Pengunjung</h5>
                    <h6 class="card-subtitle mb-2 text-muted namaPengunjung" style="font-size: 12px;"></h6>

                    <h5 class="card-title mt-3" style="font-size: 15px;">Instansi</h5>
                    <h6 class="card-subtitle mb-2 text-muted instansi" style="font-size: 12px;">Card subtitle</h6>

                    <h5 class="card-title mt-3" style="font-size: 15px;">Alamat</h5>
                    <h6 class="card-subtitle mb-2 text-muted alamat" style="font-size: 12px;">Card subtitle</h6>

                    <h5 class="card-title mt-3" style="font-size: 15px;">Foto Pengunjung</h5>
                    <img src="storage/61bb594d2da91.png" alt="" style="width: 60%" class="potopengunjung">

                    <h5 class="card-title mt-3" style="font-size: 15px;">Tanda Tangan</h5>
                    <img src="tandaTangan/61bb594d2e03f.png" alt="" style="width: 100%" class="tandatangan">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    @endif

    @stack('before-scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> --}}

    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    {{-- foto --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    @if(Request::is("bukutamu/create") || Request::route()->getName() == 'dataedit')
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
                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'" class="img-fluid"/>';
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
            });

            $('#simpanEdit123').click(function(){
                let ttd = signature.toDataURL();
                let data = $('#signature64').val(ttd);
            })

            let width = window.screen.width;
            if(width < 480){
                const video = document.querySelector('#camera video');
                const sig = document.querySelector('#sig');
                video.style.width = "16rem";
                sig.style.width = "15rem";
            }

        // var canvas = document.getElementById('signature-pad');

        // var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        // $('#clear').click(function(e) {
        //     e.preventDefault();
        //     sig.signature('clear');
        //     $("#signature64").val('');
        // });

    </script>
    @endif

    @if (Request::route()->getName() == 'dataedit')
        <script>
            tombolTandaTanganBatal.addEventListener('click', function(){
            containertandatangan.style.display =  'none';
            container2tandatangan.style.display = 'block';
            tombolTandaTangan.style.display = 'block';
            tombolTandaTanganBatal.style.display = 'none';
            signature.clear();
            $('#signature64').val('');
        })
        </script>
    @endif

    @if (Request::is("bukutamu"))
        <script>
            const butModal = document.querySelectorAll(".butModal");
            if(butModal.length > 0){
                butModal.forEach((el) => {
                    el.addEventListener("click", function(){
                        let tempat = [];
                        let key = el.getAttribute("data-id");
                        let data = document.querySelectorAll(`.key${key}`);
                        tempat = [];
                        data.forEach((e) => { 
                            tempat.push(e.value);
                        })
                        const namaPengunjung = document.querySelector(".namaPengunjung");
                        const instansi = document.querySelector(".instansi");
                        const alamat = document.querySelector(".alamat");
                        const potopengunjung = document.querySelector(".potopengunjung");
                        const tandatangan = document.querySelector(".tandatangan");
                        
                        namaPengunjung.innerHTML = tempat[0];
                        instansi.innerHTML = tempat[1];
                        alamat.innerHTML = tempat[2];
                        potopengunjung.setAttribute("src", `storage/${tempat[4]}`);
                        tandatangan.setAttribute("src", `tandatangan/${tempat[3]}`)
                    })
                })
            }

        </script>
    @endif


    @stack('after-script')


    <!-- Page Specific JS File -->
    </body>
    </html>
