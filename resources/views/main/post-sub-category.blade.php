@extends('main.app')
@section('main.panel')

<!-- top-add-start -->
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
            <div class="col-md-10 col-sm-9 scroll_02">
                @php
                $headline = DB::table('posts')->where('headline', 1)->first();
                @endphp

                @if (session()->get('lang') == 'indo')
                <marquee>{{ $headline->title_ind }}</marquee>
                @else
                <marquee>{{ $headline->title_en }}</marquee>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- archive_page-start -->
<section class="single_page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="single_info">
                    <span>
                        @php
                          $subcategory_name = DB::table('subcategories')->where('id', $first_subpostcat->subcategory_id)->first();
                          $category_name = DB::table('categories')->where('id', $first_subpostcat->category_id)->first();
                        @endphp
                        <a href="#">
                            <i class="fa fa-home" aria-hidden="true"></i> /
                        </a>
                        <a href="#">
                          @if (session()->get('lang') == 'indo')
                          {{ $category_name->category_ind }}
                          @else
                          {{ $category_name->category_en }}
                          @endif  /
                        </a>
                        @if (session()->get('lang') == 'indo')
                        {{ $subcategory_name->subcategory_ind }}
                        @else
                        {{ $subcategory_name->subcategory_en }}
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                @foreach ( $postSubCategory as $row )
                  
                <div class="archive_post_sec_again">
                  <div class="row">
                    <div class="col-md-4 col-sm-5">
                      <div class="archive_img_again">
                          <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                        </div>
                      </div>
                      <div class="col-md-8 col-sm-7">
                        <div class="archive_padding_again">
                          <div class="archive_heading_01">
                            <a href="#">
                              @if (session()->get('lang') == 'indo')
                                {{ $row->title_ind }}
                              @else
                                {{ $row->title_en }}
                              @endif
                            </a>
                          </div>
                          <div class="archive_dtails">
                            @if (session()->get('lang') == 'indo')
                            {!! Str::limit($row->details_ind, $limit = 300) !!}
                            @else
                            {!! Str::limit($row->details_en, $limit = 300) !!}
                            @endif 
                          </div>
                          <div class="dtails_btn"><a href="{{ route('single.post', $row->id) }}">Read More...</a>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                
                @endforeach
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="post-nav">
                            <ul class="pager">
                                <li class="active"><span class="active">01</span></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#" title="next"><i class="fa fa-forward" aria-hidden="true"></i>
                                    </a></li>
                                <li class="next"><a href="#"><i class="fa fa-fast-forward" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
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

@endsection