@extends('admin.layouts.app')

@section('content')

<style>
.button-container {
    display: flex;
    gap: 5px;
    /* Adjust the gap as needed */
}
</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>All Enquiries List</h4>
                            <div>
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
                                            <th style="text-align: center;">Id</th>
                                            <th style="text-align: center;">Customer Name</th>
                                            <th style="text-align: center;">Customer Email</th>
                                            <th style="text-align: center;">Customer Number</th>
                                            <th style="text-align: center;">Total Amount</th>
                                            <th style="text-align: center;">Enquiry Status</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allEnquiries as $data)
                                        <tr>
                                            <td style="text-align: center;">{{ $data->enquiry_id }}</td>
                                            <td style="text-align: center;">{{ $data->customer_name }}</td>
                                            <td style="text-align: center;">{{ $data->customer_email }}</td>
                                            <td style="text-align: center;">{{ $data->mobile_no }}</td>
                                            <td style="text-align: center;">{{ $data->total_amount }}</td>
                                            <td style="text-align: center;">
                                                @if($data->enquiry_status == 1)
                                                <span class="badge badge-primary">New</span>
                                                @elseif($data->enquiry_status == 2)
                                                <span class="badge badge-warning">Assigned</span>
                                                @elseif($data->enquiry_status == 3)
                                                <span class="badge badge-success">Completed</span>
                                                @elseif($data->enquiry_status == 4)
                                                <span class="badge badge-primary">Accepted</span>
                                                @else
                                                <span class="badge badge-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">

                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">

                                                        Actions
                                                    </button>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('view.enquiry.details', ['enquiry' => $data->enquiry_id]) }}">
                                                            View
                                                        </a>


                                                        <li>
                                                            <button type="button"
                                                                class="dropdown-item assign-driver-btn"
                                                                data-enquiry-id="{{ $data->enquiry_id }}">
                                                                Assign Drivers
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item cancel-btn"
                                                                data-enquiry-id="{{ $data->enquiry_id }}">
                                                                Cancel Enquiry
                                                            </button>
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

<!-- Modal for Assign Driver -->
<div class="modal fade" id="assignDriverModal" tabindex="-1" role="dialog" aria-labelledby="assignDriverModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignDriverModalLabel">Assign Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to assign driver -->
                <form method="POST" action="{{ route('assign.driver') }}">
                    @csrf
                    <input type="hidden" id="enquiry_id" name="enquiry_id">
                    <!-- Your form fields for assigning driver -->
                    <div class="form-group">
                        <label for="driver_id">Select Drivers:</label>
                        <div id="driver_id">
                            @if($drivers->isEmpty())
                            <h5>Drivers Not Available</h5>
                            @else

                            <div class="form-group">
                                <select class="form-control dropdown" name="driver_id" id="driver_id">
                                    <option value="" selected="selected">-- Select Driver --</option>
                                    @foreach($drivers as $driver)
                                    <option value="{{$driver->driver_id}}">
                                        {{ $driver->first_name }} {{ $driver->last_name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Assign Driver</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Cancel Enquiry -->
<div class="modal fade" id="cancelEnquiryModal" tabindex="-1" aria-labelledby="cancelEnquiryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelEnquiryModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this Enquiry?
            </div>
            <div class="modal-footer">
                <form id="cancelEnquiryForm" method="POST" action="{{ route('cancel.enquiry') }}"
                    style="display: inline;">
                    @csrf
                    <input type="hidden" id="cancel_enquiry_id" name="enquiry_id">
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var assignDriverBtns = document.querySelectorAll('.assign-driver-btn');
    assignDriverBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var enquiryId = this.getAttribute('data-enquiry-id');
            document.getElementById('enquiry_id').value = enquiryId;
            $('#assignDriverModal').modal('show');
        });
    });

    var cancelBtns = document.querySelectorAll('.cancel-btn');
    cancelBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var enquiryId = this.getAttribute('data-enquiry-id');
            document.getElementById('cancel_enquiry_id').value = enquiryId;
            $('#cancelEnquiryModal').modal('show');
        });
    });
});
</script>

@endsection