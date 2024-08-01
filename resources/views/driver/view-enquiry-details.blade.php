@extends('driver.layouts.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Enquiry Details</h4>
                        <a href="/driver-dashboard" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @if($enquiries->trip_type == 'One Way')
                                <tr>
                                    <th colspan="2" style="text-align: center;"><b>{{$enquiries->trip_type}} Trip</b>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{$enquiries->customer_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$enquiries->customer_email}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td>{{$enquiries->mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Alternate Mobile No</th>
                                    <td>{{$enquiries->alternate_mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$enquiries->address}}</td>
                                </tr>
                                <tr>
                                    <th>Pincode</th>
                                    <td>{{$enquiries->pincode}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle Type</th>
                                    <td>{{$enquiries->vehicle_type}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle Class</th>
                                    <td>{{$enquiries->vehicle_class}}</td>
                                </tr>
                                <tr>
                                    <th>PickUp Location</th>
                                    <td>{{$enquiries->pickup_location}}</td>
                                </tr>
                                <tr>
                                    <th>Drop Location</th>
                                    <td>{{$enquiries->drop_location}}</td>
                                </tr>
                                <tr>
                                    <th>Pick Up Date & Time</th>
                                    <td>{{$enquiries->pickup_date}} {{$enquiries->pickup_time}}</td>
                                </tr>
                                <tr>
                                    <th>Distance</th>
                                    <td>{{$enquiries->total_distance}}</td>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td>{{$enquiries->total_amount}}</td>
                                </tr>
                                @else
                                <tr>
                                    <th colspan="2" style="text-align: center;">{{$enquiries->trip_type}} Trip</th>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{$enquiries->customer_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$enquiries->customer_email}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td>{{$enquiries->mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Alternate Mobile No</th>
                                    <td>{{$enquiries->alternate_mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$enquiries->address}}</td>
                                </tr>
                                <tr>
                                    <th>Pincode</th>
                                    <td>{{$enquiries->pincode}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle Type</th>
                                    <td>{{$enquiries->vehicle_type}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle Name</th>
                                    <td>{{$enquiries->vehicle_class}}</td>
                                </tr>
                                <tr>
                                    <th>PickUp Location</th>
                                    <td>{{$enquiries->pickup_location}}</td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{$enquiries->pickup_date}} {{$enquiries->pickup_time}}</td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td>{{$enquiries->drop_date}} {{$enquiries->drop_time}}</td>
                                </tr>
                                <tr>
                                    <th>Wii You Provide Food for Driver</th>
                                    <td>{{$enquiries->food}}</td>
                                </tr>
                                <tr>
                                    <th>Total Hours</th>
                                    <td>{{$enquiries->total_hours}}</td>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td>{{$enquiries->total_amount}}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection