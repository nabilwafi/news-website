@extends('main.app')
@section('main.panel')

@php

$firstThumbnail = DB::table('posts')->where('posts.first_section_thumbnail', 1)->first();
$firstSection = DB::table('posts')->where('posts.first_section', 1)->limit(8)->get();

@endphp


<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <div class="top-add"><img src="{{ asset('main/img/top-ad.jpg') }}" alt="" /></div>
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
        @php
        $notice = DB::table('notices')->first();
        @endphp

        @if ($notice->status == 1)
        <div class="row scroll">

            <div class="col-md-2 col-sm-3 scroll_01 ">
                @if (session()->get('lang') == 'indo')
                Penting :
                @else
                Notice :
                @endif
            </div>


            <div class="col-md-10 col-sm-9 scroll_02">
                <marquee> {!! $notice->notice !!} </marquee>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- 1st-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-md-10 col-sm-10">
                        <div class="lead-news">
                            <div class="service-img"><a href="{{ route('single.post',$firstThumbnail->id) }}"><img
                                        src="{{ $firstThumbnail->image }}" width="800px" alt="Notebook"></a></div>
                            <div class="content">
                                <h4 class="lead-heading-01">
                                    <a href="{{ route('single.post',$firstThumbnail->id) }}">
                                        @if (session()->get('lang') == 'indo')
                                        {{ $firstThumbnail->title_ind }}
                                        @else
                                        {{ $firstThumbnail->title_en }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach ($firstSection as $row)
                    <div class="col-md-3 col-sm-3">
                        <div class="top-news">
                            <a href="#"><img src="{{ $row->image }}" alt="Notebook"></a>
                            <h4 class="heading-02">
                                <a href="#">
                                    @if (session()->get('lang') == 'indo')
                                    {{ $row->title_ind }}
                                    @else
                                    {{ $row->title_ind }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="add"><img src="{{asset('main/img/top-ad.jpg')}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                <!-- news-start -->
                @php

                $category = DB::table('categories')->limit(2)->get();

                @endphp

                <div class="row">
                    @foreach ($category as $row)
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                <a href="#">
                                    @if (session()->get('lang') == 'indo')
                                    {{ $row->category_ind }}
                                    @else
                                    {{ $row->category_en }}
                                    @endif
                                    <span>
                                        @if (session()->get('lang') == 'indo')
                                        Selanjutnya
                                        @else
                                        More
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        @php
                                        $firstThumbnailBig = DB::table('posts')->where('category_id',
                                        $row->id)->first();
                                        @endphp
                                        <a href="#">
                                            <img src="{{ $firstThumbnailBig->image }}" alt="Notebook">
                                        </a>

                                        <h4 class="heading-02">
                                            <a href="#">\
                                                @if (session()->get('lang') == 'indo')
                                                {{ $firstThumbnailBig->title_ind }}
                                                @else
                                                {{ $firstThumbnailBig->title_en }}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @php
                                    $firstThumbnailBig = DB::table('posts')->where('category_id',
                                    $row->id)->limit(2)->get();
                                    @endphp
                                    @foreach ($firstThumbnailBig as $row)
                                    <div class="image-title">

                                        <a href="#">
                                            <img src="{{ $row->image }}" alt="Notebook">
                                        </a>

                                        <h4 class="heading-03">
                                            <a href="#">
                                                @if (session()->get('lang') == 'indo')
                                                {{ $row->title_ind }}
                                                @else
                                                {{ $row->title_en }}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('main/img/add_01.jpg')}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                <!-- youtube-live-start -->
                @php

                $liveTV = DB::table('livetvs')->first();

                @endphp

                @if ($liveTV->status == 1)
                <div class="cetagory-title-03">Live TV</div>
                <div class="photo">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item"
                        style="margin-bottom:5px;">
                        {!! $liveTV->embed_code !!}
                    </div>
                </div><!-- /.youtube-live-close -->
                @endif

                <!-- facebook-page-start -->
                <div class="cetagory-title-03">Facebook </div>
                <div class="fb-root">
                    facebook page here
                </div><!-- /.facebook-page-close -->

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{asset('main/img/add_01.jpg')}}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">

            @php
            $category = DB::table('categories')->limit(4)->skip(1)->get();
            @endphp

            @foreach ($category as $row)

            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02">
                        <a href="#">
                            @if (session()->get('lang') == 'indo')
                            {{ $row->category_ind }}
                            @else
                            {{ $row->category_ind }}
                            @endif
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                @if (session()->get('lang') == 'indo')
                                Semua Berita
                                @else
                                All News
                                @endif
                            </span>
                        </a>
                    </div>
                    @php
                    $otherThumbnail = DB::table('posts')->where('category_id', $row->id)->first();
                    $otherThumbnailSmall = DB::table('posts')->where('category_id', $row->id)->limit(3)->get();
                    @endphp

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#">
                                    <img src="{{ $otherThumbnail->image }}" alt="Notebook">
                                </a>
                                <h4 class="heading-02">
                                    <a href="#">
                                        @if (session()->get('lang') == 'indo')
                                        {!! $otherThumbnail->title_ind !!}
                                        @else
                                        {{ $otherThumbnail->title_en }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                        @foreach ($otherThumbnailSmall as $row)
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#">
                                    <img src="{{ $row->image }}" alt="Notebook">
                                </a>
                                <h4 class="heading-03">
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
            </div>
            @endforeach
            <!-- ******* -->

            <!-- add-start -->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="add"><img src="{{asset('main/img/top-ad.jpg')}}" alt="" /></div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="add"><img src="{{asset('main/img/top-ad.jpg')}}" alt="" /></div>
                </div>
            </div><!-- /.add-close -->

        </div>
</section><!-- /.2nd-news-section-close -->

<!-- 3rd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="cetagory-title-02">
                    <a href="#">
                        @if (session()->get('lang') == 'indo')
                        Fitur <i class="fa fa-angle-right" aria-hidden="true"></i>
                        Semua berita distrik disini
                        @else
                        Feature <i class="fa fa-angle-right" aria-hidden="true"></i>
                        all district news tab here
                        @endif

                        <span>
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            @if (session()->get('lang') == 'indo')
                            Semua Berita
                            @else
                            All News
                            @endif
                        </span>
                    </a>
                </div>

                @php
                $district = DB::table('districts')->first();
                $bigPostDistrict = DB::table('posts')->where('posts.district_id', $district->id)->first();

                $districts = DB::table('districts')->limit(6)->skip(1)->get();
                @endphp
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news">
                            <a href="#"><img src="{{ $bigPostDistrict->image }}" alt="Notebook"></a>
                            <h4 class="heading-02">
                                <a href="#">
                                    @if (session()->get('lang') == 'indo')
                                    {{ $bigPostDistrict->title_ind }}
                                    @else
                                    {{ $bigPostDistrict->title_en }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @foreach ($districts as $row)
                        @php
                        $smallPostDistrict = DB::table('posts')->where('posts.district_id',
                        $row->id)->inRandomOrder()->limit(4)->get();
                        @endphp
                        @foreach ($smallPostDistrict as $row)
                        <div class="image-title">
                            <a href="#"><img src="{{ $row->image }}" alt="Notebook"></a>
                            <h4 class="heading-03">
                                <a href="#">
                                    @if (session()->get('lang') == 'indo')
                                    {{ $row->title_ind }}
                                    @else
                                    {{ $row->title_en }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @foreach ($districts as $row)
                        @php
                        $smallPostDistrict = DB::table('posts')->where('posts.district_id',
                        $row->id)->inRandomOrder()->limit(4)->get();
                        @endphp
                        @foreach ($smallPostDistrict as $row)
                        <div class="image-title">
                            <a href="#"><img src="{{ $row->image }}" alt="Notebook"></a>
                            <h4 class="heading-03">
                                <a href="#">
                                    @if (session()->get('lang') == 'indo')
                                    {{ $row->title_ind }}
                                    @else
                                    {{ $row->title_en }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <!-- ******* -->
                <br />
                @php
                $subdistrict = DB::table('subdistricts')->first();
                $bigPostDistrict = DB::table('posts')->where('posts.district_id', $district->id)->first();

                $subdistricts = DB::table('subdistricts')->where('subdistricts.id', 7)->limit(6)->get();
                @endphp
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="cetagory-title-02">
                            <a href="#">
                                @if (session()->get('lang') == 'indo')
                                {{ $subdistrict->subdistrict_ind }}
                                @else
                                {{ $subdistrict->subdistrict_en }}
                                @endif
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    @if (session()->get('lang') == 'indo')
                                    Semua Berita
                                    @else
                                    All News
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="bg-gray">
                            <div class="top-news">
                                <a href="#"><img src="{{ $bigPostDistrict->image }}" alt="Notebook"></a>
                                <h4 class="heading-02">
                                    <a href="#">
                                        @if (session()->get('lang') == 'indo')
                                        {{ $bigPostDistrict->title_ind }}
                                        @else
                                        {{ $bigPostDistrict->title_en }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @foreach ($subdistricts as $row)
                        @php
                        $postBogor = DB::table('posts')->where('posts.subdistrict_id',
                        $row->id)->inRandomOrder()->limit(7)->get();
                        @endphp
                        @foreach ($postBogor as $row)
                        <div class="news-title">
                            <a href="#">
                                @if (session()->get('lang') == 'indo')
                                {{ $row->title_ind }}
                                @else
                                {{ $row->title_en }}
                                @endif
                            </a>
                        </div>

                        @endforeach
                        @endforeach
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @foreach ($subdistricts as $row)
                        @php
                        $postBogor = DB::table('posts')->where('posts.subdistrict_id',
                        $row->id)->inRandomOrder()->skip(1)->limit(7)->get();
                        @endphp
                        @foreach ($postBogor as $row)
                        <div class="news-title">
                            <a href="#">
                                @if (session()->get('lang') == 'indo')
                                {{ $row->title_ind }}
                                @else
                                {{ $row->title_en }}
                                @endif
                            </a>
                        </div>

                        @endforeach
                        @endforeach
                    </div>
                </div>
                @php
                $dis = DB::table('districts')->get();
                @endphp
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
                <form action="{{ route('search.dis') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 form-group">
                            <label for="exampleSelectGender">Select Districts</label>
                            <select name="district_id" id="exampleSelectGender" class="form-control">
                                @foreach ($dis as $row)
                                <option value="{{ $row->id }}" disable="" selected="">
                                    {{ $row->district_en }} || {{ $row->district_ind }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-lg-5 form-group">
                            <label for="exampleSelectGender">Select SubDistricts</label>
                            <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                            </select>
                        </div>

                        <div class="col-lg-2 form-group">
                            <button type="submit" class="btn btn-primary">Select</button>
                        </div>

                    </div>
                </form><!-- /.add-close -->


            </div>
            <div class="col-md-3 col-sm-3">
                <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                                @if (session()->get('lang') == 'indo')
                                Terbaru
                                @else
                                Latest
                                @endif
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                                @if (session()->get('lang') == 'indo')
                                Populer
                                @else
                                Popular
                                @endif
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                                @if (session()->get('lang') == 'indo')
                                Favorit
                                @else
                                Favourite
                                @endif
                            </a>
                        </li>
                    </ul>

                    @php
                    $latest = DB::table('posts')->orderBy('id', 'desc')->limit(8)->get();
                    $popular = DB::table('posts')->orderBy('id', 'asc')->inRandomOrder()->limit(8)->get();
                    $favourite = DB::table('posts')->orderBy('id', 'desc')->inRandomOrder()->limit(8)->get();
                    @endphp

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach ( $latest as $row )
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="#">
                                            @if (session()->get('lang') == 'indo')
                                            {{ $row->title_ind }}
                                            @else
                                            {{ $row->title_en }}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                @foreach ( $popular as $row )
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="#">
                                            @if (session()->get('lang') == 'indo')
                                            {{ $row->title_ind }}
                                            @else
                                            {{ $row->title_en }}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab23">
                            <div class="news-titletab">
                                @foreach ( $favourite as $row )
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="#">
                                            @if (session()->get('lang') == 'indo')
                                            {{ $row->title_ind }}
                                            @else
                                            {{ $row->title_en }}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Namaj Times -->
                @php

                $prayer = DB::table('prayers')->first();

                @endphp

                <div class="cetagory-title-03">
                    @if (session()->get('lang') == 'indo')
                    Waktu Sholat
                    @else
                    Prayer Time
                    @endif
                </div>
                @if (session()->get('lang') == 'indo')
                <table>
                    <tr>
                        <th>Fajr</th>
                        <td>{{ $prayer->fajr }}</td>
                    </tr>
                    <tr>
                        <th>Johor</th>
                        <td>{{ $prayer->zuhur }}</td>
                    </tr>
                    <tr>
                        <th>Asor</th>
                        <td>{{ $prayer->ashar }}</td>
                    </tr>
                    <tr>
                        <th>Maghrib</th>
                        <td>{{ $prayer->maghrib }}</td>
                    </tr>
                    <tr>
                        <th>Isya</th>
                        <td>{{ $prayer->isya }}</td>
                    </tr>
                </table>
                @else
                <table>
                    <tr>
                        <th>Fajar</th>
                        <td>{{ $prayer->fajr }}</td>
                    </tr>
                    <tr>
                        <th>Zuhur</th>
                        <td>{{ $prayer->zuhur }}</td>
                    </tr>
                    <tr>
                        <th>Ashar</th>
                        <td>{{ $prayer->ashar }}</td>
                    </tr>
                    <tr>
                        <th>Maghrib</th>
                        <td>{{ $prayer->maghrib }}</td>
                    </tr>
                    <tr>
                        <th>Isya</th>
                        <td>{{ $prayer->isya }}</td>
                    </tr>
                </table>
                @endif
                <!-- Namaj Times -->
                <div class="cetagory-title-03">Old News </div>
                <form action="" method="post">
                    <div class="old-news-date">
                        <input type="text" name="from" placeholder="From Date" required="">
                        <input type="text" name="" placeholder="To Date">
                    </div>
                    <div class="old-date-button">
                        <input type="submit" value="search ">
                    </div>
                </form>
                <!-- news -->
                <br><br><br><br><br>
                @php
                $website = DB::table('websites')->first();
                @endphp

                <div class="cetagory-title-04"> Important Website</div>
                <div class="">
                    <div class="news-title-02">
                        <h4 class="heading-03"><a href="{{ $website->website_link }}"><i class="fa fa-check"
                                    aria-hidden="true"></i> {{ $website->website_name }}</a> </h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section><!-- /.3rd-news-section-close -->









<!-- gallery-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="gallery_cetagory-title">
                    @if (session()->get('lang') == 'indo')
                    Galeri Foto
                    @else
                    Photo Gallery
                    @endif
                </div>

                @php
                $bigPhoto = DB::table('photos')->where('type', 1)->first();
                $smallPhoto = DB::table('photos')->limit(5)->get();
                @endphp

                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                <img src="{{ $bigPhoto->photo }}" alt="Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="photo_list_bg">
                            @foreach ( $smallPhoto as $row)
                            <div class="photo_img photo_border active">
                                <img src="{{ $row->photo }}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                    {{ $row->title }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!--=======================================
            Video Gallery clickable jquary  start
        ========================================-->

                <script>
                    var slideIndex = 1;
                    showDivs(slideIndex);

                    function plusDivs(n) {
                        showDivs(slideIndex += n);
                    }

                    function currentDiv(n) {
                        showDivs(slideIndex = n);
                    }

                    function showDivs(n) {
                        var i;
                        var x = document.getElementsByClassName("myPhotos");
                        var dots = document.getElementsByClassName("demo");
                        if (n > x.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = x.length
                        }
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                        }
                        x[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " w3-opacity-off";
                    }
                </script>

                <!--=======================================
            Video Gallery clickable  jquary  close
        =========================================-->

            </div>
            <div class="col-md-4 col-sm-5">
                <div class="gallery_cetagory-title">
                    @if (session()->get('lang') == 'indo')
                    Galeri Video
                    @else
                    Video Gallery
                    @endif

                </div>

                @php
                $bigVideo = DB::table('videos')->where('type', 1)->first();
                $smallVideo = DB::table('videos')->limit(5)->skip(1)->get();
                @endphp

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="video_screen">
                            <div class="myVideos" style="width:100%">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    {!! $bigVideo->embed_code !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="gallery_sec owl-carousel">

                            @foreach ( $smallVideo as $row )
                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    {!! $row->embed_code !!}
                                </div>
                                <div class="heading-03">
                                    <div class="content_padding">
                                        {{ $row->title }}
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                    showDivss(slideIndex);

                    function plusDivs(n) {
                        showDivss(slideIndex += n);
                    }

                    function currentDivs(n) {
                        showDivss(slideIndex = n);
                    }

                    function showDivss(n) {
                        var i;
                        var x = document.getElementsByClassName("myVideos");
                        var dots = document.getElementsByClassName("demo");
                        if (n > x.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = x.length
                        }
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                        }
                        x[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " w3-opacity-off";
                    }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->





<!-- top-footer-start -->
<section>
    <div class="container-fluid">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="foot-logo">
                        <img src="{{asset('main/img/demofooter.png')}}" style="height: 50px;" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-4">
                    <div class="social">
                        <ul>
                            <li><a href="" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                            <li><a href="" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                            <li><a href="" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a>
                            </li>
                            <li><a href="" target="_blank" class="android"> <i class="fa fa-android"></i></a></li>
                            <li><a href="" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                            <li><a href="" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="apps-img">
                        <ul>
                            <li><a href="#"><img src="{{asset('main/img/apps-01.png')}}" alt="" /></a></li>
                            <li><a href="#"><img src="{{asset('main/img/apps-02.png')}}" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.top-footer-close -->

<!-- middle-footer-start -->
@php
    $websetting = DB::table('websettings')->first();
@endphp


<section class="middle-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="editor-one">
                    
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-two">
                    @if (session()->get('lang') == 'indo')
                    Alamat : {!! $websetting->address_ind !!}
                    @else
                    Address : {!! $websetting->address_en !!}
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-three">
                    @if (session()->get('lang') == 'indo')
                    Notel : {{ $websetting->phone_ind }}
                    @else
                    Phone : {{ $websetting->phone_en }}
                    @endif
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

<script type="text/javascript">
        // For SubDistrict
        $('select[name="district_id"]').on('change', function () {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{  url('/get/subdistrict/frontend') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#subdistrict_id").empty();
                        $.each(data, function (key, value) {
                            $("#subdistrict_id").append('<option value="' + value
                                .id + '">' + value.subdistrict_en + " || " +
                                value.subdistrict_ind + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });

</script>


@endsection