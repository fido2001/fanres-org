@extends('frontend.app')

@section('content')
<section class="blog_area single_post_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="youtube-area pt-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="video-items-active">
                                        <div class="video-items text-center">
                                            <div class="responsive">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <div id="player-container" class="embed-responsive-item"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_details">
                        <h2>Live Streaming GPR TV</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget post_category_widget" style="padding: 0px 10px; margin-top:48px">
                        <h4 class="widget_title" style="margin-bottom: 0px">Sedang Tayang :</h4>
                        <div class="progress-table-wrap">
                            <div class="progress-table" style="min-width: 310px">
                                <div class="table-head">
                                    {{-- <div class="serial">#</div> --}}
                                    <div class="country" style="width: 40%">Pukul</div>
                                    <div class="visit" style="width: 60%">Program Acara</div>
                                </div>
                                @foreach ($jadwalTayang as $tayang)
                                <div class="table-row">
                                    {{-- <div class="serial">01</div> --}}
                                    <div class="country" style="width: 40%">{{ $tayang->mulai }} - {{ $tayang->selesai }}</div>
                                    <div class="visit" style="width: 60%">{{ $tayang->acara }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('after-js')
<script>
setTimeout(function() {
    location.reload();
}, 1800000);
</script>
@endpush