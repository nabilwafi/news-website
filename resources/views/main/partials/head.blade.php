@php
  $seo = DB::table('seos')->first();
@endphp

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="description" content="{{ $seo->meta_description }}">
<meta name="google_verification" content="{{ $seo->google_verification }}">
<title>{{ $seo->meta_title }}</title>

<link href="{{ asset('main/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('main/css/menu.css') }}" rel="stylesheet">
<link href="{{ asset('main/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('main/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('main/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('main/css/owl.carousel.min.css') }}" rel="stylesheet">
<link  href="{{ asset('main/style.css') }}" rel="stylesheet">