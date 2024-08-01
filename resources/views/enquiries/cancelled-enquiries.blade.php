@extends('admin.layouts.app')

@section('content')

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Cancelled Enquiries List</h4>
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
                                            <th style="text-align: center;">Id</th>
                                            <th style="text-align: center;">Customer Name</th>
                                            <th style="text-align: center;">Customer Email</th>
                                            <th style="text-align: center;">Customer Number</th>
                                            <th style="text-align: center;">Address</th>
                                            <th style="text-align: center;">Total Amount</th>
                                            <th style="text-align: center;">Enquiry Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cancelledEnquiries as $data)
                                        <tr>
                                            <td style="text-align: center;">{{ $data->enquiry_id }}</td>
                                            <td style="text-align: center;">{{ $data->customer_name }}</td>
                                            <td style="text-align: center;">{{ $data->customer_email }}</td>
                                            <td style="text-align: center;">{{ $data->mobile_no }}</td>
                                            <td style="text-align: center;">{{ $data->address }} - {{$data->pincode}}
                                            </td>
                                            <td style="text-align: center;">{{ $data->total_amount }}</td>
                                            <td style="text-align: center;">
                                                @if($data->enquiry_status == 3)
                                                <span class="badge badge-danger">Cancelled</span>
                                                @endif
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