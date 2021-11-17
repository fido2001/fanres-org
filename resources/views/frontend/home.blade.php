@extends('frontend.app')

@section('content')
<!-- Trending Area Start -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <span class="trending-tittle" style="padding-bottom: 1px">
                <strong>Berita Terbaru</strong>
                <div class="desktop">
                    <div class="trending-animated">
                        <ul id="js-news" class="js-hidden">
                            @foreach ($dataHeadline as $headline)
                            <li class="news-item">{{ $headline->tulisan }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
<div class="recent-articles">
    <div class="container">
        <div class="recent-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="recent-active dot-style d-flex dot-style">
                        @foreach ($videoBerita as $berita)
                        <div class="single-recent mb-100">
                            <div class="what-img" style="margin-bottom: 40px">
                                @if ($berita->cover != null)
                                <img src="{{ URL('../storage/'.$berita->thumbnail)}}" alt="">
                                @else
                                <a href="{{ route('show.video', $berita->slug) }}"><img src="{{ $berita->thumbnail }}" alt="" title="{{ $berita->title }}"></a>
                                @endif
                            </div>
                            <div class="what-cap">
                                <h4><a href="{{ route('show.video', $berita->slug) }}" title="{{ $berita->title }}">{{ Str::limit($berita->title, 50) }}</a></h4>
                                <small><a href="{{ route('show.instansi', $berita->instansi->slug) }}">{{ $berita->instansi->name }}</a></small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mobile-ver">
                    <marquee behavior="scroll" direction="left">
                        @foreach ($dataHeadline as $headline)
                            {{ $headline->tulisan }} |
                        @endforeach
                    </marquee>    
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="weekly2-news-area white-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex">
                        @foreach ($videoBerita as $berita)
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                @if ($berita->cover != null)
                                <img style="height: 180px" src="{{ URL('../storage/'.$berita->thumbnail)}}" alt="">    
                                @else
                                <a href="{{ route('show.video', $berita->title) }}" title="{{ $berita->title }}"><img style="height: 180px" src="{{ $berita->thumbnail }}" alt=""></a>
                                @endif
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1"><a style="color: black" href="{{ route('show.category', $berita->category->slug) }}">{{ $berita->category->name }}</a></span>
                                <br><br><small><a href="{{ route('show.instansi', $berita->instansi->slug) }}">{{ $berita->instansi->name }}</a></small>
                                <p>{{ Carbon\Carbon::parse($berita->created_at)->translatedFormat("d M Y") }}</p>
                                <h4><a href="{{ route('show.video', $berita->slug) }}" title="{{ $berita->title }}">{{ Str::limit($berita->title, 55) }}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="blog_area single_post_area mb-5" id="live">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="youtube-area pt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h4>Live Streaming GPR TV</h4>
                                    <div class="video-items-active">
                                        <div class="video-items text-center">
                                            {{-- <div class="responsive">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <div id="player-container2" class="embed-responsive-item"></div>
                                                </div>
                                            </div> --}}
                                            <div id='player' class="responsive">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <video id='hls-example'  class="video-js vjs-default-skin embed-responsive-item" width="100%" height="100%" autoplay controls>
                                                        <source type="application/x-mpegURL" src="https://h1.intechmedia.net/intech/ch66.m3u8">
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget post_category_widget" style="padding: 0px 10px; margin-top:20px">
                        <h4 class="widget_title" style="margin-bottom: 0px">Sedang Tayang:</h4>
                        <div class="progress-table-wrap">
                            <div class="progress-table" style="min-width: 310px">
                                <div class="table-head">
                                    <div class="country" style="width: 40%">Pukul</div>
                                    <div class="visit" style="width: 60%">Program Acara</div>
                                </div>
                                @foreach ($jadwalTayang as $tayang)
                                <div class="table-row">
                                    <div class="country" style="width: 40%">{{ $tayang->mulai }} - {{ $tayang->selesai }}</div>
                                    <div class="visit" style="width: 60%">{{ $tayang->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h6 align="justify" style="color:#635c5c; font-size:18px">GPR TV juga bisa disaksikan melalui kanal:</h6>
                            <h6 align="justify" style="color:#635c5c; font-size:15px" ><span>&#183;</span> C Band Telkom 4 Frekuensi 3766 SB 21818 Pol H</h6>
                            <h6 align="justify" style="color:#635c5c; font-size:15px" ><span>&#183;</span> Ku Band Ses-9 Frekuensi 11861 SB 45000 Pol H</h6>
                        </div>
                        <div class="navigation-top mt-3">
                            <div class="d-sm-flex">
                                <h4 class="like-info mr-3" style="color:#635c5c">Bagikan:</h4>
                                {{-- <div class="col-sm-4 text-center my-2 my-sm-0"> --}}
                                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                                {{-- </div> --}}
                                <span>
                                    <ul class="social-icons list-inline">
                                        <li class="list-inline-item" style="margin-right: .6em"><a aria-label="WhatsApp" rel="noopener" alt="Whatsapp" href="https://api.whatsapp.com/send?text=Live Streaming GPR TV https://www.gprtv.id/live" onclick="return !window.open(this.href, 'Whatsapp Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank"><i style="font-size: 27px;" class="fab fa-whatsapp"></i>
                                        </a></li>
                                        <li class="list-inline-item" style="margin-right: .6em"><a aria-label="Facebook" rel="noopener" alt="Facebook" href="https://www.facebook.com/dialog/share?app_id=734827236923234&amp;display=popup&amp;href=https%3A%2F%2Fwww.gprtv.id%2Flive" onclick="return !window.open(this.href, 'Facebook Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                                        <i style="font-size: 27px;" class="fab fa-facebook-f"></i>
                                        </a></li>
                                        <li class="list-inline-item" style="margin-right: .6em"><a aria-label="Twitter" rel="noopener" alt="Twitter" href="https://twitter.com/intent/tweet?text=Live Streaming GPR TV https://www.gprtv.id/live" onclick="return !window.open(this.href, 'Twitter Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                                        <i style="font-size: 27px;" class="fab fa-twitter"></i>
                                        </a></li>
                                        <li class="list-inline-item" style="margin-right: .6em"><a aria-label="line" rel="noopener" alt="Line" href="https://lineit.line.me/share/ui?url=https://www.gprtv.id/live&amp;text=Live Streaming GPR TV" onclick="return !window.open(this.href, 'Line Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                                        <i style="font-size: 27px;" class="fab fa-line"></i>
                                    </a></li>
                                </ul>
                            </span>
                        </div>
                            <h5 style="color:#635c5c" class="mt-3">Salin Link:</h5>
                            <span>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <input type="text" class="form-control" value="https://www.gprtv.id/#live" id="myInput" readonly>
                                    </li>
                                    <li class="list-inline-item">
                                        <button onclick="myFunction()"><i style="font-size: 25px" class="fas fa-copy"></i></button>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </aside>
                </div>
            </div>
        </div><hr>
    </div>
</section>
<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            @foreach ($videoTerbaru as $video)
                            @if ($video->cover != null)
                            <a href="{{ route('show.video', $video->slug) }}"><img src="{{ URL('../storage/'.$video->thumbnail)}}" alt=""></a>
                            @elseif ($video->cover == null)
                            <a href="{{ route('show.video', $video->slug) }}"><img src="{{ $video->thumbnail }}" alt="" title="{{ $video->title }}"></a>
                            @endif
                            <div class="trend-top-cap">
                                <span><a style="color:black" href="{{ route('show.category', $video->category->slug) }}">{{ $video->category->name }}</a></span><br>
                                <h2><a href="{{ route('show.video', $video->slug) }}" title="{{ $video->title }}">{{ $video->title }}</a></h2>
                                <small><a href="{{ route('show.instansi', $video->instansi->slug) }}">{{ $video->instansi->name }}</a></small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($videoTerbaruBawah as $video)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        @if ($video->cover != null)
                                        <a href="{{ route('show.video', $video->slug) }}"><img src="{{ URL('../storage/'.$video->thumbnail)}}" alt=""></a>
                                        @elseif ($video->cover == null)
                                        <a href="{{ route('show.video', $video->slug) }}" title="{{ $video->title }}"><img src="{{ $video->thumbnail }}" alt=""></a>
                                        @endif
                                    </div>
                                    <div class="trend-bottom-cap">
                                        @if ($video->category_id == '1') 
                                        <span class="color1">
                                        @elseif ($video->category_id == '8')
                                        <span class="color3">
                                        @elseif ($video->category_id == '3')
                                        <span class="color2">
                                        @else
                                        <span class="color4">
                                        @endif
                                        <a style="color:black" href="{{ route('show.category', $video->category->slug) }}">{{ $video->category->name }}</a></span><br>
                                        <h4><a href="{{ route('show.video', $video->slug) }}">{{ $video->title }}</a></h4>
                                        <small><a href="{{ route('show.instansi', $video->instansi->slug) }}">{{ $video->instansi->name }}</a></small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @foreach ($videoOlahragaBawah as $olahraga)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        @if ($olahraga->cover != null)
                                        <a href="{{ route('show.video', $olahraga->slug) }}"><img src="{{ URL('../storage/'.$olahraga->thumbnail)}}" alt=""></a>
                                        @elseif ($olahraga->cover == null)
                                        <a href="{{ route('show.video', $olahraga->slug) }}" title="{{ $olahraga->title }}"><img src="{{ $olahraga->thumbnail }}" alt=""></a>
                                        @endif
                                    </div>
                                    <div class="trend-bottom-cap">
                                        @if ($olahraga->category_id == '1') 
                                        <span class="color1">
                                        @elseif ($olahraga->category_id == '8')
                                        <span class="color3">
                                        @elseif ($olahraga->category_id == '3')
                                        <span class="color2">
                                        @else
                                        <span class="color4">
                                        @endif
                                        <a style="color:black" href="{{ route('show.category', $olahraga->category->slug) }}">{{ $olahraga->category->name }}</a></span><br>
                                        <h4><a href="{{ route('show.video', $olahraga->slug) }}">{{ $olahraga->title }}</a></h4>
                                        <small><a href="{{ route('show.instansi', $olahraga->instansi->slug) }}">{{ $olahraga->instansi->name }}</a></small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Right content -->
                <div class="col-lg-4 col-md-12">
                    <h4 class="mb-3">Jadwal Hari Ini</h4>
                    <?php $tgl = Carbon\Carbon::now() ?> 
                    <h5 class="my-1">{{ Carbon\Carbon::parse($tgl)->translatedFormat("l, d F Y") }}</h5>
                    {{-- @foreach ($videoTerbaruKanan as $video) --}}
                    <div class="trand-right-single d-flex">
                        {{-- <div class="trand-right-img">
                            <img style="width: 150px" src="{{ $video->thumbnail }}" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1"><a style="color:black" href="{{ route('show.category', $video->category->slug) }}">{{ $video->category->name }}</a></span>
                            <h4><a href="{{ route('show.video', $video->slug) }}">{{ $video->title }}</a></h4>
                        </div> --}}
                        <?php $hari = Carbon\Carbon::parse($tgl)->translatedFormat("l") ?>
                        @if ($hari == 'Senin')
                        <div class="progress-table-wrap" style="height: 600px; overflow: auto;">
                            <div class="progress-table" style="min-width: 350px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 45%">Pukul</div>
                                    <div class="visit" style="width: 55%">Program Acara</div>
                                </div>
                                @foreach ($jadwalSenin as $senin)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 45%">{{ $senin->mulai }} - {{ $senin->selesai }}</div>
                                    <div class="visit" style="width: 55%">{{ $senin->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @elseif ($hari == 'Selasa')
                        <div class="progress-table-wrap" style="height: 600px; overflow: auto;">
                            <div class="progress-table" style="min-width: 350px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 45%">Pukul</div>
                                    <div class="visit" style="width: 55%">Program Acara</div>
                                </div>
                                @foreach ($jadwalSelasa as $selasa)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 45%">{{ $selasa->mulai }} - {{ $selasa->selesai }}</div>
                                    <div class="visit" style="width: 55%">{{ $selasa->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @elseif ($hari == 'Rabu')
                        <div class="progress-table-wrap" style="height: 600px; overflow: auto;">
                            <div class="progress-table" style="min-width: 350px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 45%">Jam</div>
                                    <div class="visit" style="width: 55%">Program Acara</div>
                                </div>
                                @foreach ($jadwalRabu as $rabu)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 45%">{{ $rabu->mulai }} - {{ $rabu->selesai }}</div>
                                    <div class="visit" style="width: 55%">{{ $rabu->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @elseif ($hari == 'Kamis')
                        <div class="progress-table-wrap" style="height: 600px; overflow: auto;">
                            <div class="progress-table" style="min-width: 350px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 45%">Pukul</div>
                                    <div class="visit" style="width: 55%">Program Acara</div>
                                </div>
                                @foreach ($jadwalKamis as $kamis)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 45%">{{ $kamis->mulai }} - {{ $kamis->selesai }}</div>
                                    <div class="visit" style="width: 55%">{{ $kamis->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @elseif ($hari == 'Jumat')
                        <div class="progress-table-wrap" style="height: 600px; overflow: auto;">
                            <div class="progress-table" style="min-width: 350px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 45%">Pukul</div>
                                    <div class="visit" style="width: 55%">Program Acara</div>
                                </div>
                                @foreach ($jadwalJumat as $jumat)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 45%">{{ $jumat->mulai }} - {{ $jumat->selesai }}</div>
                                    <div class="visit" style="width: 55%">{{ $jumat->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @elseif ($hari == 'Sabtu')
                        <div class="progress-table-wrap" style="height: 600px; overflow: auto;">
                            <div class="progress-table" style="min-width: 350px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 45%">Pukul</div>
                                    <div class="visit" style="width: 55%">Program Acara</div>
                                </div>
                                @foreach ($jadwalSabtu as $sabtu)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 45%">{{ $sabtu->mulai }} - {{ $sabtu->selesai }}</div>
                                    <div class="visit" style="width: 55%">{{ $sabtu->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @elseif ($hari == 'Minggu')
                        <div class="progress-table-wrap" style="height: 600px; overflow: auto;">
                            <div class="progress-table" style="min-width: 350px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 45%">Pukul</div>
                                    <div class="visit" style="width: 55%">Program Acara</div>
                                </div>
                                @foreach ($jadwalMinggu as $minggu)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 45%">{{ $minggu->mulai }} - {{ $minggu->selesai }}</div>
                                    <div class="visit" style="width: 55%">{{ $minggu->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    {{-- @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Area End -->
<!--   Weekly-News start -->
{{-- <div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Film Pendek Terbaru</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        @foreach ($filmPendek as $film)
                        <div class="weekly-single">
                            <div class="weekly-img">
                                @if ($film->cover != null)
                                <img style="width: 368px; height: 430px" src="{{ URL('../storage/'.$video->thumbnail)}}" alt="">
                                @else
                                <img style="width: 368px; height: 430px" src="{{ $film->thumbnail }}" alt="">
                                @endif
                            </div>
                            <div class="weekly-caption">
                                <h4><a href="{{ route('show.video', $film->slug) }}">{{ $film->title }}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   --}}
<div class="recent-articles" style="margin-top: 25px">
    <div class="container">
        <div class="recent-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Film Pendek Terbaru</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="recent-active dot-style d-flex dot-style">
                        @foreach ($filmPendek as $film)
                        <div class="single-recent mb-100">
                            <div class="what-img"  style="margin-bottom: 30px">
                                @if ($film->cover != null)
                                <img src="{{ URL('../storage/'.$film->thumbnail)}}" alt="">
                                @else
                                <a href="{{ route('show.video', $film->slug) }}" title="{{ $film->title }}"><img src="{{ $film->thumbnail }}" alt="{{ $film->title }}"></a>
                                @endif
                            </div>
                            <div class="what-cap">
                                {{-- <span class="color3">{{ $film->category->name }}</span> --}}
                                <h4><a href="{{ route('show.video', $film->slug) }}" title="{{ $film->title }}">{{ Str::limit($film->title, 55) }}</a></h4>
                                <small><a href="{{ route('show.instansi', $film->instansi->slug) }}">{{ $film->instansi->name }}</a></small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="recent-articles gray-bg" style="margin-top: 25px">
    <div class="container">
        <div class="recent-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Dari Kementerian Komunikasi dan Informatika RI</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="recent-active dot-style d-flex dot-style">
                        @foreach ($videoKominfo as $kominfo)
                        <div class="single-recent mb-100">
                            <div class="what-img"  style="margin-bottom: 40px">
                                @if ($kominfo->cover != null)
                                <img src="{{ URL('../storage/'.$kominfo->thumbnail)}}" alt="">
                                @else
                                <a href="{{ route('show.video', $kominfo->slug) }}" title="{{ $kominfo->title }}"><img src="{{ $kominfo->thumbnail }}" alt=""></a>
                                @endif
                            </div>
                            <div class="what-cap">
                                <span class="color3">{{ $kominfo->category->name }}</span>
                                <h4><a href="{{ route('show.video', $kominfo->slug) }}" title="{{ $kominfo->title }}">{{ Str::limit($kominfo->title, 45) }}</a></h4>
                                {{-- <small><a href="{{ route('show.instansi', $kominfo->instansi->slug) }}">{{ $kominfo->instansi->name }}</a></small> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="weekly2-news-area gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Dari Kementerian Komunikasi dan Informatika RI</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">
                        @foreach ($videoKominfo as $kominfo)
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                @if ($kominfo->cover != null)
                                <img style="height: 180px" src="{{ URL('../storage/'.$kominfo->thumbnail)}}" alt="">    
                                @else
                                <img style="height: 180px" src="{{ $kominfo->thumbnail }}" alt="">
                                @endif
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1"><a style="color: black" href="{{ route('show.category', $kominfo->category->slug) }}">{{ $kominfo->category->name }}</a></span>
                                <p>{{ Carbon\Carbon::parse($kominfo->created_at)->translatedFormat("d M Y") }}</p>
                                <h4><a href="{{ route('show.video', $kominfo->slug) }}">{{ $kominfo->title }}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('after-js')
<script>
    function myFunction() {
    var copyText = document.getElementById("myInput");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("URL Berhasil disalin");
}
</script>
@endpush