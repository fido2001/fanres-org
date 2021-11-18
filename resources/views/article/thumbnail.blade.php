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
                    <li class="breadcrumb-item active">Link Thumbnail</li>
                </ol>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Cara Mendapatkan Link Thumbnail Video YouTube</h4>
                    </div>
                    <div class="card-body">
                        <h4>1. Salin video ID/kode dari video YouTube yang ingin diambil thumbnailnya</h4>
                        <p>Contoh :</p>
                        <h5>Link Penuh : https://www.youtube.com/watch?v=DhRIBJ6q8Ks</h5>
                        <h5>Kode yang disalin : <b>DhRIBJ6q8Ks</b></h5><hr>
                        <h4>2. Ganti <b>kode-video</b> pada link dibawah dengan kode video yang telah disalin (pilih salah satu)</h4>
                        <h5>Link Thumbnail :</h5>
                        <h5>Resolusi SD 640 X 480 : https://i.ytimg.com/vi/kode-video/sddefault.jpg</h5>
                        <h5>Resolusi MQ 320 X 180 : https://i.ytimg.com/vi/kode-video/mqdefault.jpg</h5>
                        <h5>Resolusi HQ 480 X 360 : https://i.ytimg.com/vi/kode-video/hqdefault.jpg</h5>
                        <h5>Resolusi HD 1920 X 1080 : https://i.ytimg.com/vi/kode-video/maxresdefault.jpg</h5>
                        <p>Contoh :</p>
                        <h5>Link Thumbnail : <b>https://i.ytimg.com/vi/DhRIBJ6q8Ks/maxresdefault.jpg</b></h5><hr>
                        <h4>3. Salin dan Tempel Link Thumbnail yang telah didapatkan ke form bagian Link thumbnail</h4><hr>
                        <a href="{{ route('video.create') }}" class="btn btn-inverse">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection