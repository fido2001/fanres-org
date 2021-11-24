@extends('frontend.app')
@section('title', 'Articles')
@section('content')
<section class="blog_area pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <div class="mb-5">
                        @isset($category)
                            <h3>Category : {{ $category->name }}</h3>
                        @endisset
                        @isset($tag)
                            <h3>Tag : {{ $tag->name }}</h3>
                        @endisset
                        @isset($query)
                            <h3>Result for : {{ $query }}</h3>
                        @endisset
                        @if (!isset($tag) && !isset($category) && !isset($query))
                            <h3>All Articles</h3>
                        @endif
                    </div>
                    @forelse ($articles as $article)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            {{-- @if ($article->cover == null)
                            <a href="{{ route('show.video', $article->slug) }}" title="{{ $article->title }}"><img class="card-img rounded-0" src="{{ $article->thumbnail }}" alt=""></a>
                            @else --}}
                            <img class="card-img rounded-0" src="{{ asset('/storage/'.$article->cover) }}" alt="">
                            {{-- @endif --}}
                            <a href="#" class="blog_item_date">
                                <h3>{{ Carbon\Carbon::parse($article->created_at)->translatedFormat("d M") }}</h3>
                                <p>{{ Carbon\Carbon::parse($article->created_at)->translatedFormat("Y") }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-block" href="{{ route('show.article', $article->slug) }}">
                                <h2>{{ $article->title }}</h2>
                            </a>
                            <p>{!! Str::limit(nl2br($article->body), 300) !!}</p>
                            <ul class="blog-info-link">
                                <li>Kategori : <a href="{{ route('show.category', $article->category->slug) }}">{{ $article->category->name }}</a></li>
                        <li>Tags : 
                            @foreach ($article->tags as $tag)
                            <a href="{{ route('show.tag', $tag->slug) }}"> {{ $tag->name }} </a>
                            @endforeach
                        </li>
                        <li><i class="fa fa-user"></i> <span class="text-muted">{{ $article->author->name }}</span></li>
                            </ul>
                        </div>
                    </article>
                    @empty
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            There is Nothing.
                        </div>
                    </div>
                    @endforelse
                    {{ $articles->links('vendor.pagination.bootstrap-4') }}
                    <br>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('search.article') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="q" placeholder='Enter the Keywords'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'">
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
                        <h3 class="widget_title">Newest Article</h3>
                        @foreach ($allarticles as $article)
                        <div class="media post_item">
                            <img style="width: 50%; object-fit: cover; height: 100px" src="{{ asset('/storage/'.$article->cover) }}" alt="post">
                            <div class="media-body">
                                <a href="{{ route('show.article', $article->slug) }}">
                                    <h3>{{ Str::limit($article->title, 25) }}</h3>
                                </a>
                                <p>{{ $article->created_at->diffForHumans() }}</p>
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