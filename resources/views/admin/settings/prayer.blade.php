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
        <h4 class="card-title">Update Prayers</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.prayer',$prayer->id) }}">
          @csrf

          <div class="form-group">
            <label for="exampleInputUsername1">Fajr</label>
            <input type="text" class="form-control" id="exampleInputUsername1" name="fajr" value="{{ $prayer->fajr }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Zuhur</label>
            <input type="text" class="form-control" id="exampleInputUsername1" name="zuhur" value="{{ $prayer->zuhur }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Ashar</label>
            <input type="text" class="form-control" id="exampleInputUsername1" name="ashar" value="{{ $prayer->ashar }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Maghrib</label>
            <input type="text" class="form-control" id="exampleInputUsername1" name="maghrib" value="{{ $prayer->maghrib }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Isya</label>
            <input type="text" class="form-control" id="exampleInputUsername1" name="isya" value="{{ $prayer->isya }}">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection