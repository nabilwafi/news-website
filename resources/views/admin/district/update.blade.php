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
        <h4 class="card-title">Add District</h4>
        <form class="forms-sample" action="{{ route('update.district', $district->id) }}" method="POST">
          @csrf

          <div class="form-group">
            <label for="exampleInputUsername1">District English</label>
            <input type="text" class="form-control" id="exampleInputUsername1" name="district_en" value="{{ $district->district_en }}">
            @error('district_en')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">District Indonesia</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="district_ind" value="{{ $district->district_ind }}">
            @error('district_ind')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection