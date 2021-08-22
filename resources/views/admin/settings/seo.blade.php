@extends('admin.app')
@section('admin.panel')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row align-items-center">
              <div class="col-4 col-sm-3 col-xl-2">
                <img src="{{asset('admin/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
              </div>
              <div class="col-5 col-sm-7 col-xl-8 p-0">
                <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
              </div>
              <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                <span>
                  <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update SEO</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.seo',$seo->id) }}">
          @csrf

          <div class="form-group">
            <label for="exampleInputUsername1">Meta Author</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your Facebook" name="meta_author" value="{{ $seo->meta_author }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Meta Title</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your Twitter" name="meta_title" value="{{ $seo->meta_title }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Meta Desciption</label>
            <textarea name="meta_description" class="form-control" id="summernote" cols="30" rows="10">{{ $seo->meta_description }}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Google Analytics</label>
            <textarea name="google_analytics" class="form-control" id="summernote" cols="30" rows="10">{{ $seo->google_analytics }}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Google Verification</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your Instagram" name="google_verification" value="{{ $seo->google_verification }}">
            @error('google_verification')
              <span class="text-dange">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Alexa Analytics</label>
            <textarea name="alexa_analytics" class="form-control" id="" cols="30" rows="10">{{ $seo->alexa_analytics }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection