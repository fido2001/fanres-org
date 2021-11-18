@extends('frontend.app')

@section('content')
<section class="blog_area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 posts-list">
                <div class="single-post">
                    <div class="youtube-area pt-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    @if ($video->cover == null)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="{{ $video->link_file }}" class="embed-responsive-item" allowfullscreen></iframe>
                                    </div>
                                    @else
                                    <video src="{{ URL('../storage/'.$video->link_file) }}" width="100%" height="100%" controls controlslist="nodownload"></video>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_details">
                        <h2>{{ $video->title }}</h2>
                        <h3 style="font-size: 15px"><a style="color: black" href="{{ route('show.instansi', $video->instansi->slug) }}">Instansi {{ $video->instansi->name }}</a>
                            <div class="f-right">{{ Carbon\Carbon::parse($video->created_at)->translatedFormat("l, d F Y") }}</div>
                        </h3>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li>Kategori : <a href="{{ route('show.category', $video->category->slug) }}">{{ $video->category->name }}</a></li>
                            <li>Tags : 
                                @foreach ($video->tags as $tag)
                                <a href="{{ route('show.tag', $tag->slug) }}"> {{ $tag->name }} </a>
                                @endforeach
                            </li>
                            <li><i class="fa fa-user"></i> <span class="text-muted">{{ $video->author->first_name }} {{ $video->author->last_name }}</span></li>
                        </ul>
                        <p class="excert">
                            {!! nl2br($video->body) !!}
                        </p>
                    </div>
                </div>
                <div class="navigation-top mb-5">
                    <div class="d-sm-flex justify-content-start">
                        <ul class="social-icons list-inline">
                            <li class="list-inline-item"><h5 class="mr-3" style="color:#635c5c">Bagikan:</h5></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="WhatsApp" rel="noopener" title="Bagikan Melalui Whatsapp" alt="Whatsapp" href="https://api.whatsapp.com/send?text=Live GPR TV - {{ $video->title }} https://www.gprtv.id/videos/{{ $video->slug }}" onclick="return !window.open(this.href, 'Whatsapp Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank"><i style="font-size: 20px;" class="fab fa-whatsapp"></i>
                            </a></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="Facebook" rel="noopener" title="Bagikan Melalui Facebook" alt="Facebook" href="https://www.facebook.com/dialog/share?app_id=734827236923234&amp;display=popup&amp;href=https%3A%2F%2Fwww.gprtv.id%2Fvideos%2F{{ $video->slug }}" onclick="return !window.open(this.href, 'Facebook Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                            <i style="font-size: 20px;" class="fab fa-facebook-f"></i>
                            </a></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="Twitter" rel="noopener" title="Bagikan Melalui Twitter" alt="Twitter" href="https://twitter.com/intent/tweet?text=GPR TV - {{ $video->title }} https://www.gprtv.id/videos/{{ $video->slug }}" onclick="return !window.open(this.href, 'Twitter Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                            <i style="font-size: 20px;" class="fab fa-twitter"></i>
                            </a></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="line" rel="noopener" title="Bagikan Melalui Line" alt="Line" href="https://lineit.line.me/share/ui?url=https://www.gprtv.id/videos/{{ $video->slug }}&amp;text=GPR TV - {{ $video->title }}" onclick="return !window.open(this.href, 'Line Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                            <i style="font-size: 20px;" class="fab fa-line"></i>
                            </a></li>
                        </ul>
                    </div>
                    <div class="d-sm-flex justify-content-start mt-3">
                        <ul class="social-icons list-inline">
                            <li class="list-inline-item"><h5 class="mr-1" style="color:#635c5c">Salin Link:</h5></li>
                            <li class="list-inline-item">
                                <button onclick="myFunction()" title="Salin Link"><i style="font-size: 20px" class="fas fa-copy"></i></button>
                            </li>
                            <li class="list-inline-item">
                                <input type="text" class="form-control" value="https://www.gprtv.id/videos/{{ $video->slug }}" id="myInput">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('search.video') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="q" class="form-control" placeholder='Masukkan Kata Kunci'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                    <button class="btns" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Cari</button>
                        </form>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Kategori</h4>
                        <ul class="list cat-list">
                            <li>
                                @foreach ($dataKategori as $kategori)
                                <a href="{{ route('show.category', $kategori->slug) }}" class="d-flex">
                                    <p>{{ $kategori->name }}</p>
                                </a>
                                @endforeach
                            </li>
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">{{ ucfirst(trans($video->category->name)) }} Terbaru</h3>
                        @foreach ($videos as $video)
                        <div class="media post_item">
                            @if ($video->cover != null)
                            <img style="width: 50%" src="{{ URL('../storage/'.$video->thumbnail)}}" alt="post">
                            @else
                            <img style="width: 50%" src="{{ $video->thumbnail }}" alt="post">
                            @endif
                            <div class="media-body">
                                <a href="{{ route('show.video', $video->slug) }}">
                                    <h3>{{ Str::limit($video->title, 25) }}</h3>
                                </a>
                                {{-- <p>{{ Carbon\Carbon::parse($video->created_at)->translatedFormat("l, d F Y") }}</p> --}}
                                <p>{{ $video->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('after-js')
<script>
    function myFunction() {
    var copyText = document.getElementById("myInput");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("URL Berhasil Disalin");
}
</script>
@endpush