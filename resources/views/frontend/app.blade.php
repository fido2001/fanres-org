<!doctype html>
<html class="no-js" lang="zxx">
@include('frontend.head')

<body>
    
<!-- Preloader Start -->
<!-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div> -->
<!-- Preloader Start -->

    @include('frontend.header')

    <main>
        @yield('content')
    </main>
    
    @include('frontend.footer')

	@include('frontend.script')
    </body>
</html>