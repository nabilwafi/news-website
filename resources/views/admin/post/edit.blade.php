@extends('admin.app')
@section('admin.panel')

<?php 

  $subCategories = DB::table('subcategories')->get();
  $subDistricts = DB::table('subdistricts')->get();

?>


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
        <h4 class="card-title">Add New Post</h4>
        <form class="forms-sample" method="POST" action="{{ route('update.post',$post->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputUsername1">Title English</label>
              <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Title English" name="title_en" value="{{ $post->title_en }}">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputUsername1">Title Indonesia</label>
              <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Title Indonesia" name="title_ind" value="{{ $post->title_ind }}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="exampleSelectGender">Select Category</label>
                <select class="form-control" name="category_id" id="exampleSelectGender">
                  @foreach ($categories as $category)
                  <option 
                    value="{{ $category->id }}"
                    <?php if($category->id == $post->category_id) echo "selected" ?>
                  >
                    {{ $category->category_en }} || {{ $category->category_ind }}
                  </option>
                  @endforeach
              </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="exampleSelectGender">Select SubCategory</label>
                <select class="form-control" id="subcategory_id" name="subcategory_id">
                  @foreach ($subCategories as $subcat)
                  <option 
                    value="{{ $subcat->id }}"
                    <?php if($subcat->id == $post->subcategory_id) echo "selected" ?>
                  >
                    {{ $subcat->subcategory_en }} || {{ $subcat->subcategory_ind }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                @error('district_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="exampleSelectGender">Select Districts</label>
                <select class="form-control" name="district_id" id="exampleSelectGender">
                  <option value="">-- Select District --</option>
                  @foreach ($districts as $district)
                  <option 
                    value="{{ $district->id }}"
                    <?php if($district->id == $post->district_id) echo "selected" ?>
                  >
                  {{ $district->district_en }} || {{ $district->district_ind }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="exampleSelectGender">Select SubDistricts</label>
                <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                  @foreach ($subDistricts as $subdis)
                  <option 
                    value="{{ $subdis->id }}"
                    <?php if($subdis->id == $post->subdistrict_id) echo "selected" ?>
                  >
                    {{ $subdis->subdistrict_en }} || {{ $subdis->subdistrict_en }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label>Image upload</label>
              <div class="mb-3">
                <input class="form-control" name="image" type="file">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label>Old Image</label>
              <div class="mb-3">
                <input type="hidden" name="old_image" value="{{ $post->image }}" hidden>
                <img src="{{ asset($post->image) }}" alt="" style="width: 100px; height: 100px;">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputUsername1">Tags English</label>
              <input type="text" class="form-control" name="tags_en" id="exampleInputUsername1" placeholder="Title English" value="{{$post->tags_en}}">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputUsername1">Tags Indonesia</label>
              <input type="text" class="form-control" name="tags_ind" id="exampleInputUsername1" placeholder="Title Indonesia" value="{{$post->tags_ind}}">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Details English</label>
            <textarea class="form-control" name="details_en" id="summernote" rows="4">
              {{ $post->details_en }}
            </textarea>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Details Indonesia</label>
            <textarea class="form-control" name="details_ind" id="summernote2" rows="4">
              {{ $post->details_ind }}
            </textarea>
          </div>
          <h4 class="text-center">Extra Options</h4>
          <div class="row my-5">
            <div class="form-check form-check-success my-3 col-md-3">
              <label class="form-check-label">
                <input 
                  type="checkbox" 
                  name="headline" 
                  class="form-check-input" 
                  value="1"
                  <?php if($post->headline == 1) echo "checked" ?>
                > 
                Headline
              </label>
            </div>
            <div class="form-check form-check-success my-3 col-md-3">
              <label class="form-check-label">
                <input 
                  type="checkbox" 
                  name="bigthumbnail" 
                  class="form-check-input" 
                  value="1"
                  <?php if($post->bigthumbnail == 1) echo "checked" ?>
                > 
                General Big Thumbnail 
              </label>
            </div>
            <div class="form-check form-check-success my-3 col-md-3">
              <label class="form-check-label">
                <input 
                  type="checkbox" 
                  name="first_section" 
                  class="form-check-input" 
                  value="1"
                  <?php if($post->first_section == 1) echo "checked" ?>
                > 
                First Section 
              </label>
            </div>
            <div class="form-check form-check-success my-3 col-md-3">
              <label class="form-check-label">
                <input 
                  type="checkbox" 
                  name="first_section_thumbnail" 
                  class="form-check-input" 
                  value="1"
                  <?php if($post->first_section_thumbnail == 1) echo "checked" ?>
                  > 
                First Section Big Thumbnail 
              </label>
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
    // For Subcategory
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/get/subcategory/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                      $("#subcategory_id").empty();
                        $.each(data,function(key,value){
                            $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en + " || " + value.subcategory_ind +'</option>');
                        });
                    },
                    
                });
            } else {
                alert('danger');
            }
        });

        // For SubDistrict
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/get/subdistrict/') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                      $("#subdistrict_id").empty();
                        $.each(data,function(key,value){
                            $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en + " || " + value.subdistrict_ind +'</option>');
                        });
                    },
                    
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection