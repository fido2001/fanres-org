@extends('backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Video</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/backend') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('video.index') }}">Video</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('video.create') }}">Tambah Data</a></li>
                    <li class="breadcrumb-item active">Link YouTube</li>
                </ol>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Cara Mendapatkan Link Video YouTube</h4>
                    </div>
                    <div class="card-body">
                        <h4>1. Pada halaman video, klik <b>Bagikan</b></h4>
                        <img src="{{ URL('/assets') }}/images/Screenshot 1.jpg" alt="" width="700px"><hr>
                        <h4>2. Akan muncul pop-up, setelah itu klik <b>sematkan</b></h4>
                        <img src="{{ URL('/assets') }}/images/Screenshot 2.jpg" alt="" width="700px"><hr>
                        <h4>3. Akan muncul pop-up. Setelah itu salin link video yang ada didalam <b>src="link-video"</b></h4>
                        <img class="mb-3" src="{{ URL('/assets') }}/images/Screenshot 3.png" alt="" width="800px">
                        <h5>Contoh diatas : <b>https://www.youtube.com/embed/2vVDLfoIIW0</b></h5><hr>
                        <h4>4. Salin dan Tempel Link yang telah didapatkan ke form bagian Link Youtube</h4><hr>
                        <a href="{{ route('video.create') }}" class="btn btn-inverse">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection