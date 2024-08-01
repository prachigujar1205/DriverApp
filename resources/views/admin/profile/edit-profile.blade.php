@extends('admin.layouts.app')

@section('content')

<style>
.profile-img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto; /* Center the image horizontally */
}
</style>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card" style="margin-left: 25%;">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/images/faces/face3.jpg') }}" alt="profile" class="profile-img">
                        </div>
                        <form class="forms-sample" method="post" action="{{ route('update.admin.profile') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="name"
                                        placeholder="Enter Your Name" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="exampleInputEmail2" name="email"
                                        placeholder="Email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" name="mobile_no"
                                        placeholder="Mobile number" value="{{ Auth::user()->mobile_no }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="exampleInputPassword2" name="password"
                                        placeholder="Enter Your New Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-success" href="/dashboard"><i class="mdi mdi-home me-2"></i>Back to home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
