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
                        <h4 class="card-title">Photos table</h4>
                        <a href="{{ route('add.photo') }}" class="btn btn-outline-primary btn-icon-text my-2"
                            style="float: right">
                            <i class="mdi mdi-upload btn-icon-prepend"></i> Add Photo
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Photo Title </th>
                                        <th> Photo Image </th>
                                        <th> Type </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($photos as $photo)
                                    <tr>
                                        <td>{{ $photos->firstItem()+$loop->index }}</td>
                                        <td>{{ $photo->title }}</td>
                                        <td>
                                            <img src="{{ asset($photo->photo) }}" alt="" style="width: 50px; height:50px;" />
                                        </td>
                                        <td>
                                            @if ($photo->type == 1)
                                                <span class="badge badge-success">Big Photo</span>
                                            @else
                                                <span class="badge badge-info">Small Photo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.photo', $photo->id) }}"
                                                class="btn-info btn">Edit</a>
                                            <a href="{{ route('delete.photo', $photo->id) }}"
                                                class="btn-danger btn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="my-3">
                            {{ $photos->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
