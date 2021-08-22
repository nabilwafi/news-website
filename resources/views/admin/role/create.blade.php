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
        <h4 class="card-title">Insert User Role</h4>
        <form class="forms-sample" method="POST" action="{{ route('create.writer') }}">
          @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Name</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div class="my-5 row">
            <div class="col-md-6">
              <div class="form-check form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="category"> Category </label>
              </div>
              <div class="form-check form-check-success">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="district"> District </label>
              </div>
              <div class="form-check form-check-info">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="post"> Post </label>
              </div>
              <div class="form-check form-check-danger">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="setting"> Setting </label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-check form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="website"> Website </label>
              </div>
              <div class="form-check form-check-success">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="gallery"> Gallery </label>
              </div>
              <div class="form-check form-check-info">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="ads"> Advertisement </label>
              </div>
              <div class="form-check form-check-danger">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="1" name="role"> Role </label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection