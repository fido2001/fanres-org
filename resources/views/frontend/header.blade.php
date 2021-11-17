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
                                <a href="{{ URL('/') }}"><img src="{{ URL('/frontend') }}/img/logo-gpr.png" alt="" style="width: 175px" class="rounded"></a>
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
                                    <a href="index.html"><img src="{{ URL('/frontend') }}/img/logo-gpr.png" alt="" style="width: 80px; margin-top:10px; margin-bottom:10px; border:0.5pt white solid" class="rounded"></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">    
                                        <li><a href="{{ URL('/') }}" class="@if (Request::segment(1) == '')
                                            active @endif">BERANDA</a></li>
                                        <li><a href="{{ URL('/#live') }}" class="rainbow_text_animated">LIVE</a></li>
                                        <li><a href="{{ route('all.video') }}" class="@if (Request::segment(1) == 'videos')
                                            active @endif">VIDEO</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('all.video') }}">SEMUA VIDEO</a>
                                                @foreach ($dataKategori as $kategori)
                                                <li><a href="{{ route('show.category', $kategori->slug) }}">{{ Str::upper($kategori->name) }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('jadwal') }}" class="@if (Request::segment(1) == 'jadwalacara')
                                            active @endif">JADWAL ACARA</a></li>
                                        <li><a href="{{ route('aboutus') }}" class="@if (Request::segment(1) == 'tentangkami')
                                            active @endif">TENTANG KAMI</a></li>
                                        @guest
                                        <li class="f-right"><a href="{{ route('login') }}">MASUK</a></li>
                                        @else
                                        <li class="f-right"><a href="#">Hai, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                                            <ul class="submenu">
                                                @if (Auth::user()->level == 'admin')
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
                                                <form action="{{ route('search.video') }}" method="GET">
                                                    <input name="q" type="text" placeholder="Cari">
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