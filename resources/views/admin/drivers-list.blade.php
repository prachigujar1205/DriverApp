@extends('admin.layouts.app')

@section('content')

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Drivers List</h4>
                            <div>
                                <a href="/add-new-driver" class="btn btn-primary">Add New</a>
                                <a class="btn btn-sm btn-success" href="/dashboard">
                                    <i class="mdi mdi-home"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible;">
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
                                            <th>Driver Status</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($drivers as $driver)
                                        <tr>
                                            <td>{{ $driver->driver_id }}</td>
                                            <td><img src="{{ asset('assets/driver_images/' . $driver->profile_image) }}"
                                                    alt="Driver Image" style="width: 50px; height: 50px;" /></td>
                                            <td>{{ $driver->first_name }}</td>
                                            <td>{{ $driver->driver_email }}</td>
                                            <td>{{ $driver->mobile_no }}</td>
                                            <td>
                                                @if($driver->driver_status == 0)
                                                <span class="badge badge-warning">New</span>
                                                @elseif($driver->driver_status == 1)
                                                <span class="badge badge-secondary">Pending For Verification</span>
                                                @elseif($driver->driver_status == 2)
                                                <span class="badge badge-success">Verified</span>
                                                @elseif($driver->driver_status == 3)
                                                <span class="badge badge-primary">Online</span>
                                                @else($driver->driver_status == 4)
                                                <span class="badge badge-danger">Offline</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle"
                                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: 200px; overflow-y: auto;">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('add.documents', ['driver' => $driver->driver_id]) }}">
                                                                Add Documents
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('edit.driver', ['driver' => $driver->driver_id]) }}">
                                                                Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('view.driver.details', ['driver' => $driver->driver_id]) }}">
                                                                View More
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item delete-driver-btn" href="#"
                                                                data-id="{{ $driver->driver_id }}"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteDriverModal">
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
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

<!-- Add Driver Documents Modal -->
<div class="modal fade" id="addDriverDocuments" tabindex="-1" aria-labelledby="addDriverDocumentsLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDriverDocumentsLabel">Add Driver Documents</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.driver.documents') }}" id="addDriverDocumentsForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="driving_licence" class="form-label">Driving Licence</label>
                        <input type="file" class="form-control" id="driving_licence" name="driving_licence">
                    </div>

                    <div class="mb-3">
                        <label for="pan_card" class="form-label">Pan Card</label>
                        <input type="file" class="form-control" id="pan_card" name="pan_card">
                    </div>

                    <div class="mb-3">
                        <label for="aadhar_card" class="form-label">Aadhar Card</label>
                        <input type="file" class="form-control" id="aadhar_card" name="aadhar_card">
                    </div>

                    <div class="mb-3">
                        <label for="police_verification" class="form-label">Police Verification Report</label>
                        <input type="file" class="form-control" id="police_verification" name="police_verification">
                    </div>

                    <div class="mb-3">
                        <label for="electricity_bill" class="form-label">Electricity Bill</label>
                        <input type="file" class="form-control" id="electricity_bill" name="electricity_bill">
                    </div>

                    <input type="hidden" id="driver_id" name="driver_id">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Model -->
<!-- Modal -->
<div class="modal fade" id="deleteDriverModal" tabindex="-1" aria-labelledby="deleteDriverModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDriverModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this driver?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteDriverForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var addDriverDocumentsModal = document.getElementById('addDriverDocuments');
    var deleteDriverModal = document.getElementById('deleteDriverModal');

    addDriverDocumentsModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget || event.srcElement;
        var driverId = button.getAttribute('data-id');
        var form = addDriverDocumentsModal.querySelector('#addDriverDocumentsForm');
        form.querySelector('#driver_id').value = driverId;
    });

    deleteDriverModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget || event.srcElement;
        var driverId = button.getAttribute('data-id');
        var form = deleteDriverModal.querySelector('#deleteDriverForm');
        form.action = '/delete-driver/' + driverId;
    });
});
</script>

@endsection
