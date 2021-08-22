@extends('main.app')
@section('main.panel')

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <div class="top-add"><img src="{{asset('main/img/top-ad.jpg')}}" alt="" /></div>
            </div>
        </div>
    </div>
</section> <!-- /.top-add-close -->

<!-- date-start -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="date">
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka </li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> Monday, 19th October 2020 </li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section><!-- /.date-close -->

<!-- notice-start -->

<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                @if (session()->get('lang') == 'indo')
                Berita Terkini :
                @else
                Breaking News :
                @endif
            </div>

            @php
            $post = DB::table('posts')->where('posts.headline', 1)->first();
            @endphp

            <div class="col-md-10 col-sm-9 scroll_02">
                <marquee>
                    @if (session()->get('lang') == 'indo')
                    *{{ $post->title_ind }}
                    @else
                    *{{ $post->title_en }}
                    @endif
                </marquee>
            </div>
        </div>
    </div>
</section>

<!-- single-page-start -->

<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                    <li>
                        <a href="#">
                            @if (session()->get('lang') == 'indo')
                            {{ $singlePost->category_ind }}    
                            @else
                            {{ $singlePost->category_en }}
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            @if (session()->get('lang') == 'indo')
                            {{ $singlePost->subcategory_ind }}
                            @else
                            {{ $singlePost->subcategory_en }}
                            @endif
                        </a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <header class="headline-header margin-bottom-10">
                    <h1 class="headline">
                        @if (session()->get('lang') == 'indo')
                        {{ $singlePost->title_ind }}
                        @else
                        {{ $singlePost->title_en }}
                        @endif
                    </h1>
                </header>


                <div class="article-info margin-bottom-20">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="list-inline">

                                <li>LOOK AT </li>
                                <li><i class="fa fa-clock-o"></i> {{ $singlePost->post_date }} </li>
                            </ul>

                        </div>
                        <div class="col-md-6 col-sm-6 pull-right">
                            <ul class="social-nav">
                                <li><a href=""
                                        onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('#'),'facebook-share-dialog','width=626,height=436'); return false;"
                                        target="_blank" title="Facebook" rel="nofollow" class="facebook"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href=""
                                        onclick="javascript:window.open('https://twitter.com/share?text=‘#'); return false;"
                                        title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a target="_blank" href=""
                                        onclick="window.open('https://plus.google.com/share?url=#'); return false;"
                                        title="Google plus" rel="nofollow" class="google"><i
                                            class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" target="_blank" title="Print" rel="nofollow" class="print"><i
                                            class="fa fa-print"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******** -->
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="single-news">
                    <img src="{{ asset($singlePost->image) }}" alt="" />
                    <h4 class="caption">
                        @if (session()->get('lang') == 'indo')
                        {{ $singlePost->title_ind }}
                        @else
                        {{ $singlePost->title_en }}
                        @endif
                    </h4>
                    <p>
                        @if (session()->get('lang') == 'indo')
                        {!! $singlePost->details_ind !!}
                        @else
                        {!! $singlePost->details_en !!}
                        @endif
                    </p>
                </div>
                <!-- ********* -->
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading">
                            @if (session()->get('lang') == 'indo')
                            Berita Serupa
                            @else
                            Related News
                            @endif
                        </h2>
                    </div>
                    @php
                    $relatedNews = DB::table('posts')->where('posts.category_id', $post->category_id)->limit(8)->get();
                    @endphp

                    @foreach ($relatedNews as $row)
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news sng-border-btm">
                            <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                            <h4 class="heading-02">
                                <a href="#">
                                    @if (session()->get('lang') == 'indo')
                                    {{ $row->title_ind }}
                                    @else
                                    {{ $row->title_en }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('main/img/add_01.jpg')}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
                <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab"
                                data-toggle="tab" aria-expanded="false">Latest</a></li>
                        <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab"
                                aria-expanded="true">Popular</a></li>
                        <li role="presentation"><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab"
                                aria-expanded="true">Popular1</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"> educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"> educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"> ducational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"> educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"> educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"> educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"> educational institutions</a> </h4>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab23">
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('main/img/add_01.jpg')}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
            </div>
        </div>
    </div>
</section>

<!-- top-footer-start -->
<section>
    <div class="container-fluid">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="foot-logo">
                        <img src="assets/img/demofooter.png" style="height: 50px;" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-4">
                    <div class="social">
                        <ul>
                            <li><a href="" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                            <li><a href="" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                            <li><a href="" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                            <li><a href="" target="_blank" class="android"> <i class="fa fa-android"></i></a></li>
                            <li><a href="" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                            <li><a href="" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="apps-img">
                        <ul>
                            <li><a href="#"><img src="{{asset('assets/img/apps-01.png')}}" alt="" /></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/apps-02.png')}}" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.top-footer-close -->

<!-- middle-footer-start -->
<section class="middle-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="editor-one">
                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs. The passage is attributed to an unknown typesetter in the 15th century who is
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-two">
                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs. The passage is attributed to an unknown typesetter in the 15th century who is
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-three">
                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs. The passage is attributed to an unknown typesetter in the 15th century who is
                </div>
            </div>
        </div>
    </div>
</section><!-- /.middle-footer-close -->

<!-- bottom-footer-start -->
<section class="bottom-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="copyright">
                    All rights reserved © 2020 EasyLearning
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="btm-foot-menu">
                    <ul>
                        <li><a href="#">About US</a></li>
                        <li><a href="#">Contact US</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection