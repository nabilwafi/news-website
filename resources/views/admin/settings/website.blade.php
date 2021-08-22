@extends('admin.app')
@section('admin.panel')

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
        <h4 class="card-title">Update Website Setting</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.website', $webSetting->id) }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputUsername1">Website Logo Upload</label>
                <input type="file" class="form-control" id="image" name="logo">
                <input type="hidden" name="old_image" value="{{ $webSetting->logo }}">
              </div>

              <div class="col-md-6">
                <label for="exampleInputUsername1">Image</label>
                <div>
                  <img src="{{ (empty($webSetting->logo)) ? asset('admin/assets/images/faces/face10.jpg') : asset($webSetting->logo) }}" alt="" style="width: 100px; height:100px;" id="showImage">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Address English</label>
            <textarea name="address_en" id="summernote" cols="30" rows="10">{{ $webSetting->address_en }}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Address Indonesia</label>
            <textarea name="address_ind" id="summernote2" cols="30" rows="10">{{ $webSetting->address_ind }}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Phone English</label>
            <input type="number" class="form-control" id="exampleInputUsername1" name="phone_en" value="{{ $webSetting->phone_en }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Phone Indonesia</label>
            <input type="number" class="form-control" id="exampleInputUsername1" name="phone_ind" value="{{ $webSetting->phone_ind }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Email</label>
            <input type="email" class="form-control" id="exampleInputUsername1" name="email" value="{{ $webSetting->email }}">
          </div>
          

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection