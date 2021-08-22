@extends('admin.app')
@section('admin.panel')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

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
        <h4 class="card-title">Edit Profile</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="exampleInputUsername1">User Name</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your Facebook" name="name" value="{{ $editUser->name }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">User Email</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your Twitter" name="email" value="{{ $editUser->email }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">User Mobile</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your Youtube" name="mobile" value="{{ $editUser->mobile }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">User Address</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your LinkedIn" name="address" value="{{ $editUser->address }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">User Position</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Your Instagram" name="position" value="{{ $editUser->position }}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">User Gender</label>
            <select class="form-control" name="gender" id="exampleInputUsername1">
              <option value="male" {{ ($editUser->gender == "male") ? "selected" : "" }} >Male</option>
              <option value="female" {{ ($editUser->gender == "female") ? "selected" : "" }} >Female</option>
            </select>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputUsername1">Image Upload</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>

              <div class="col-md-6">
                <label for="exampleInputUsername1">Image</label>
                <div>
                  <img src="{{ (empty($editUser->image)) ? asset('admin/assets/images/faces/face1.jpg') : asset($editUser->image) }}" alt="" style="width: 100px; height:100px;" id="showImage">
                </div>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#image').change(function(e) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endsection