@extends('admin.layouts.app')

@section('content')

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Drivers Enquiries List</h4>
                            <div>
                                <a class="btn btn-sm btn-success" href="/dashboard">
                                    <i class="mdi mdi-home"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Profile</th>
                                            <th>Driver Name</th>
                                            <th>Driver Email</th>
                                            <th>Driver Number</th>
                                            <th>Country</th>
                                            <th>Gear Type</th>
                                            <th>Car Name</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($driverenquiries as $driver)
                                        <tr>
                                            <td>{{ $driver->driver_enquiry_id  }}</td>
                                            <td><img src="{{ asset('assets/driver_images/' . $driver->profile_image) }}"
                                                    alt="Driver Image" /></td>
                                            <td>{{ $driver->first_name }}</td>
                                            <td>{{ $driver->driver_email }}</td>
                                            <td>{{ $driver->mobile_no }}</td>
                                            <td>{{ $driver->country}}</td>
                                            <td>{{ $driver->gear_type}}</td>
                                            <td>{{ $driver->car_name}}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('view.driver.enquiry.details', ['driverEnquiry' => $driver->driver_enquiry_id]) }}">
                                                    View More
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection