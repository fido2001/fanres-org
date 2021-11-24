<header>
    <!-- Header Start -->
    <div class="header-area mb-3">
        <div class="main-header">
            <div class="header-mid d-none d-md-block mb-1">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 mt-2">
                            <div class="logo">
                                <a href="{{ URL('/') }}"><img src="{{ URL('/frontend') }}/img/logo-fanres2.jpeg" alt="" style="width: 150px; height:auto; border:2pt orange solid" class="rounded"></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4000">
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <img style="width: 80%;height: 105px; margin-top:5px; margin-left:160px" class="rounded" src="{{ URL('/frontend') }}/img/raja-ampat.jpg" alt="Wonderful Indonesia" title="Raja Ampat">
                                    </div>
                                    <div class="carousel-item active">
                                        <img style="width: 80%;height: 105px; margin-top:5px; margin-left:160px" class="rounded" src="{{ URL('/frontend') }}/img/panobromo2.jpg" alt="Wonderful Indonesia" title="Gunung Bromo">
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 80%;height: 105px; margin-top:5px; margin-left:160px" class="rounded" src="{{ URL('/frontend') }}/img/panorama3.jpg" alt="Wonderful Indonesia">
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 80%;height: 105px; margin-top:5px; margin-left:160px" class="rounded" src="{{ URL('/frontend') }}/img/jkt.jpg" alt="Wonderful Indonesia" title="Monumen Nasional">
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 80%;height: 105px; margin-top:5px; margin-left:160px" class="rounded" src="{{ URL('/frontend') }}/img/sumba.jpg" alt="Wonderful Indonesia" title="Sumba">
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 80%;height: 105px; margin-top:5px; margin-left:160px" class="rounded" src="{{ URL('/frontend') }}/img/ijen.jpg" alt="Wonderful Indonesia" title="Kawah Ijen">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky" style="background-color: #214288">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="{{ URL('/frontend') }}/img/logo-fanres2.jpeg" alt="" style="width: 90px; margin-top:3px; margin-bottom:px; border:1pt orange solid" class="rounded"></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">    
                                        <li><a href="{{ URL('/') }}" class="@if (Request::segment(1) == '')
                                            active @endif">HOME</a></li>
                                        <li><a href="{{ route('all.article') }}" class="@if (Request::segment(1) == 'articles')
                                            active @endif">ARTICLE</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('all.article') }}">ALL ARTICLES</a>
                                                @foreach ($dataKategori as $kategori)
                                                <li><a href="{{ route('show.category', $kategori->slug) }}">{{ Str::upper($kategori->name) }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="https://journal.fanres.org/index.php/IJFANRES" target="_blank">JOURNAL</a></li>
                                        <li><a href="" class="@if (Request::segment(1) == 'membership')
                                            active @endif">MEMBERSHIP</a></li>
                                        <li><a href="{{ route('aboutus') }}" class="@if (Request::segment(1) == 'about-us')
                                            active @endif">ABOUT US</a></li>
                                        <li><a href="{{ route('contact') }}" class="@if (Request::segment(1) == 'contact')
                                            active @endif">CONTACT</a></li>
                                        @guest
                                        <li class="f-right"><a href="{{ route('login') }}">LOGIN</a></li>
                                        @else
                                        <li class="f-right"><a href="#">Hello, {{ Auth::user()->name }}</a>
                                            <ul class="submenu">
                                                @if (Auth::user()->role == 'admin')
                                                <li><a href="{{ route('admin.index') }}">Admin Dashboard</a></li>
                                                @endif
                                                <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        @endguest
                                        <li class="header-right-btn f-right d-none d-lg-block" style="margin-top: 8px">
                                            <i class="fas fa-search special-tag" style="color:white"></i>
                                            <div class="search-box">
                                                <form action="{{ route('search.article') }}" method="GET">
                                                    <input name="q" type="text" placeholder="Search">
                                                    {{-- <button type="submit" class="btn btn-outline-info">Cari</button> --}}
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12" style="min-height: 0px">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>