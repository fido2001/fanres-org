@extends('frontend.app')
@section('title', $article->title)
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
                                    {{-- @if ($video->cover == null)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="{{ $video->link_file }}" class="embed-responsive-item" allowfullscreen></iframe>
                                    </div>
                                    @else --}}
                                    <img class="card-img rounded-0" src="{{ asset('/storage/'.$article->cover) }}" alt="">
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_details">
                        <h2>{{ $article->title }}</h2>
                        <h3 style="font-size: 15px">
                            <div class="f-right">{{ Carbon\Carbon::parse($article->created_at)->translatedFormat("l, d F Y") }}</div>
                        </h3>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li>Kategori : <a href="{{ route('show.category', $article->category->slug) }}">{{ $article->category->name }}</a></li>
                            <li>Tags : 
                                @foreach ($article->tags as $tag)
                                <a href="{{ route('show.tag', $tag->slug) }}"> {{ $tag->name }} </a>
                                @endforeach
                            </li>
                            <li><i class="fa fa-user"></i> <span class="text-muted">{{ $article->author->name }}</span></li>
                        </ul>
                        <p class="excert">
                            {!! nl2br($article->body) !!}
                        </p>
                    </div>
                </div>
                <div class="navigation-top mb-5">
                    <div class="d-sm-flex justify-content-start">
                        <ul class="social-icons list-inline">
                            <li class="list-inline-item"><h5 class="mr-3" style="color:#635c5c">Share:</h5></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="WhatsApp" rel="noopener" title="Share Via Whatsapp" alt="Whatsapp" href="https://api.whatsapp.com/send?text=Fanres.org - {{ $article->title }} https://www.fanres.org/articles/{{ $article->slug }}" onclick="return !window.open(this.href, 'Whatsapp Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank"><i style="font-size: 20px;" class="fab fa-whatsapp"></i>
                            </a></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="Facebook" rel="noopener" title="Share Via Facebook" alt="Facebook" href="https://www.facebook.com/dialog/share?app_id=734827236923234&amp;display=popup&amp;href=https%3A%2F%2Fwww.fanres.org%2Farticles%2F{{ $article->slug }}" onclick="return !window.open(this.href, 'Facebook Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                            <i style="font-size: 20px;" class="fab fa-facebook-f"></i>
                            </a></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="Twitter" rel="noopener" title="Share Via Twitter" alt="Twitter" href="https://twitter.com/intent/tweet?text=Fanres.org - {{ $article->title }} https://www.gprtv.id/articles/{{ $article->slug }}" onclick="return !window.open(this.href, 'Twitter Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                            <i style="font-size: 20px;" class="fab fa-twitter"></i>
                            </a></li>
                            <li class="list-inline-item" style="margin-right: .6em"><a aria-label="line" rel="noopener" title="Share Via Line" alt="Line" href="https://lineit.line.me/share/ui?url=https://www.fanres.org/articles/{{ $article->slug }}&amp;text=GPR TV - {{ $article->title }}" onclick="return !window.open(this.href, 'Line Share', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank">
                            <i style="font-size: 20px;" class="fab fa-line"></i>
                            </a></li>
                        </ul>
                    </div>
                    <div class="d-sm-flex justify-content-start mt-3">
                        <ul class="social-icons list-inline">
                            <li class="list-inline-item"><h5 class="mr-1" style="color:#635c5c">Copy Link:</h5></li>
                            <li class="list-inline-item">
                                <button onclick="myFunction()" title="Copy Link"><i style="font-size: 20px" class="fas fa-copy"></i></button>
                            </li>
                            <li class="list-inline-item">
                                <input type="text" class="form-control" value="https://www.fanres.org/articles/{{ $article->slug }}" id="myInput">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('search.article') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="q" class="form-control" placeholder='Enter the Keywords'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                    <button class="btns" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Search</button>
                        </form>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
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
                        <h3 class="widget_title">Newest {{ ucfirst(trans($article->category->name)) }}</h3>
                        @foreach ($articles as $article)
                        <div class="media post_item">
                            {{-- @if ($article->cover != null) --}}
                            <img style="width: 50%" src="{{ URL('../storage/'.$article->cover)}}" alt="post">
                            {{-- @else
                            <img style="width: 50%" src="{{ $article->thumbnail }}" alt="post">
                            @endif --}}
                            <div class="media-body">
                                <a href="{{ route('show.article', $article->slug) }}">
                                    <h3>{{ Str::limit($article->title, 25) }}</h3>
                                </a>
                                {{-- <p>{{ Carbon\Carbon::parse($article->created_at)->translatedFormat("l, d F Y") }}</p> --}}
                                <p>{{ $article->created_at->diffForHumans() }}</p>
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
    alert("Link copied successfully!");
}
</script>
@endpush