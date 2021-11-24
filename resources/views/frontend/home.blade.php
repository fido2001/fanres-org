@extends('frontend.app')
@section('title', 'FANRES')
@section('content')
<!-- Trending Area Start -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <span class="trending-tittle" style="padding-bottom: 1px">
                <strong>Latest News</strong>
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
                        @foreach ($articleNews as $news)
                        <div class="single-recent mb-100">
                            <div class="what-img" style="margin-bottom: 0px">
                                @if ($news->cover != null)
                                <img src="{{ asset('/storage/'.$news->cover)}}" alt="">
                                @else
                                <a href="{{ route('show.article', $news->slug) }}"><img src="{{ $news->cover }}" alt="" title="{{ $news->title }}"></a>
                                @endif
                            </div>
                            <div class="what-cap">
                                <h4><a href="{{ route('show.article', $news->slug) }}" title="{{ $news->title }}">{{ Str::limit($news->title, 50) }}</a></h4>
                                <small class="text-muted">{{ Carbon\Carbon::parse($news->created_at)->translatedFormat("d F Y") }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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

{{-- TEMPAT BEDA --}}

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
{{-- <div class="recent-articles" style="margin-top: 25px">
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
</div> --}}
{{-- <div class="recent-articles gray-bg" style="margin-top: 25px">
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
