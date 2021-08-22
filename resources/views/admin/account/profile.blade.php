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
                              <img src="{{asset('admin/assets/images/dashboard/Group126@2x.png')}}"
                                  class="gradient-corona-img img-fluid" alt="">
                          </div>
                          <div class="col-5 col-sm-7 col-xl-8 p-0">
                              <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                              <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5
                                  unique layouts!</p>
                          </div>
                          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                              <span>
                                  <a href="https://www.bootstrapdash.com/product/corona-admin-template/"
                                      target="_blank"
                                      class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profile User</h4>
                  <div class="row">
                    <div class="card col-md-6" style="width: 18rem;">
                      <div class="card-body">
                        <img class="card-img-top" src="{{ asset(Auth::user()->image) }}" alt="">
                      </div>

                      <div class="card-body">
                        <h5 class="card-title">Username : {{ Auth::user()->name }}</h5>
                        <p class="card-text">User Email : {{ Auth::user()->email }}</p>
                        <p class="card-text">User Mobile : {{ Auth::user()->mobile }}</p>
                        <p class="card-text">User Address : {{ Auth::user()->address }}</p>
                        <p class="card-text">User Gender : {{ Auth::user()->gender }}</p>
                        <p class="card-text">User Position : {{ Auth::user()->position }}</p>
                      </div>

                    </div>

                    <div class="col-md-6">
                      <a href="{{ route('edit.profile') }}" class="btn btn-outline-primary btn-icon-text my-2"
                          style="float: right">
                          <i class="mdi mdi-upload btn-icon-prepend"></i> Edit Profile
                      </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection