@extends('frontend.app')

@section('content')
<section class="blog_area pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <div class="mb-5">
                        @isset($category)
                            <h3>Kategori : {{ $category->name }}</h3>
                        @endisset
                        @isset($tag)
                            <h3>Tag : {{ $tag->name }}</h3>
                        @endisset
                        @isset($instansi)
                            <h3>Instansi : {{ $instansi->name }}</h3>
                        @endisset
                        @isset($query)
                            <h3>Hasil Pencarian : {{ $query }}</h3>
                        @endisset
                        @if (!isset($tag) && !isset($category) && !isset($instansi) && !isset($query))
                            <h3>Semua Video</h3>
                        @endif
                    </div>
                    @forelse ($videos as $video)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            @if ($video->cover == null)
                            <a href="{{ route('show.video', $video->slug) }}" title="{{ $video->title }}"><img class="card-img rounded-0" src="{{ $video->thumbnail }}" alt=""></a>
                            @else
                            <img class="card-img rounded-0" src="{{ asset('../storage/public/'.$video->thumbnail) }}" alt="">
                            @endif
                            <a href="#" class="blog_item_date">
                                <h3>{{ Carbon\Carbon::parse($video->created_at)->translatedFormat("d") }}</h3>
                                <p>{{ Carbon\Carbon::parse($video->created_at)->translatedFormat("M") }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-block" href="{{ route('show.video', $video->slug) }}">
                                <h2>{{ $video->title }}</h2>
                            </a>
                            <small><a href="{{ route('show.instansi', $video->instansi->slug) }}" style="color:#999">{{ $video->instansi->name }}</a></small><br>
                            <p>{!! Str::limit(nl2br($video->body), 300) !!}</p>
                            <ul class="blog-info-link">
                                <li>Kategori : <a href="{{ route('show.category', $video->category->slug) }}">{{ $video->category->name }}</a></li>
                        <li>Tags : 
                            @foreach ($video->tags as $tag)
                            <a href="{{ route('show.tag', $tag->slug) }}"> {{ $tag->name }} </a>
                            @endforeach
                        </li>
                        <li><i class="fa fa-user"></i> <span class="text-muted">{{ $video->author->first_name }} {{ $video->author->last_name }}</span></li>
                            </ul>
                        </div>
                    </article>
                    @empty
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            Belum ada video.
                        </div>
                    </div>
                    @endforelse
                    {{ $videos->links() }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('search.video') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="q" placeholder='Masukkan Kata Kunci'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'">
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
                            @foreach ($dataKategori as $kategori)
                            <li>
                                <a href="{{ route('show.category', $kategori->slug) }}" class="d-flex">
                                    <p>{{ $kategori->name }}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Video Terbaru</h3>
                        @foreach ($allvideos as $video)
                        <div class="media post_item">
                            @if ($video->cover == null)
                            <img style="width: 50%" src="{{ $video->thumbnail }}" alt="post">
                            @else
                            <img style="width: 50%" src="{{ URL('../storage/'.$video->thumbnail) }}" alt="post">
                            @endif
                            <div class="media-body">
                                <a href="{{ route('show.video', $video->slug) }}">
                                    <h3>{{ Str::limit($video->title, 25) }}</h3>
                                </a>
                                <p>{{ $video->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tags</h4>
                        <ul class="list">
                            @foreach ($dataTag as $tag)
                            <li>
                                <a href="{{ route('show.tag', $tag->slug) }}">{{ $tag->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection