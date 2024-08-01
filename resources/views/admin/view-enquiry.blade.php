@extends('admin.layouts.app')

@section('content')



<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Enquiry Details</h4>
                        <a href="/all-enquiries" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @if($enquiry->trip_type == "One Way")
                                <h4 class="text-center">{{$enquiry->trip_type}} Trip</h4>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{$enquiry->customer_name}}</td>
                                </tr>

                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{$enquiry->customer_email}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td>{{$enquiry->mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Alternate Mobile No</th>
                                    <td>{{$enquiry->alternate_mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$enquiry->address}}, {{$enquiry->pincode}}</td>
                                </tr>
                                <tr>
                                    <th>Pickup Location</th>
                                    <td>{{$enquiry->pickup_location}}</td>
                                </tr>
                                <tr>
                                    <th>Drop Location</th>
                                    <td>{{$enquiry->drop_location}}</td>
                                </tr>
                                <tr>
                                    <th>Pickup Date</th>
                                    <td>{{$enquiry->pickup_date}}</td>
                                </tr>
                                <tr>
                                    <th>Pickup Time</th>
                                    <td>{{$enquiry->pickup_time}}</td>
                                </tr>
                                <tr>
                                    <th>Total Distance</th>
                                    <td>{{$enquiry->total_distance}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle Type</th>
                                    <td>{{$enquiry->vehicle_type}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle Class</th>
                                    <td>{{$enquiry->vehicle_class}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Type</th>
                                    <td>{{$enquiry->payment_type}}</td>
                                </tr>
                                <tr>
                                    <th>Admin Commission</th>
                                    <td>{{$enquiry->admin_commission}}</td>
                                </tr>
                                <tr>
                                    <th>Driver Commission</th>
                                    <td>{{$enquiry->driver_commission}}</td>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td>{{$enquiry->total_amount}}</td>
                                </tr>
                                @else
                                <h4 class="text-center">{{$enquiry->trip_type}} Trip</h4>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{$enquiry->customer_name}}</td>
                                </tr>

                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{$enquiry->customer_email}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td>{{$enquiry->mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Alternate Mobile No</th>
                                    <td>{{$enquiry->alternate_mobile_no}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$enquiry->address}}, {{$enquiry->pincode}}</td>
                                </tr>
                               
                                <tr>
                                    <th>Pickup Location</th>
                                    <td>{{$enquiry->pickup_location}}</td>
                                </tr>
                                <tr>
                                    <th>Pickup Date & Time</th>
                                    <td>{{$enquiry->pickup_date}} - {{$enquiry->pickup_time}}</td>
                                </tr>
                                <tr>
                                    <th>Drop Date & Time</th>
                                    <td>{{$enquiry->drop_date}} - {{$enquiry->drop_time}}</td>
                                </tr>
                                <tr>
                                    <th>Total Hours</th>
                                    <td>{{$enquiry->total_hours}}
                                </tr>
                                <tr>
                                    <th>Vehicle Type</th>
                                    <td>{{$enquiry->vehicle_type}}
                                </tr>
                                <tr>
                                    <th>Vehicle Class</th>
                                    <td>{{$enquiry->vehicle_class}}
                                </tr>
                                <tr>
                                    <th>Payment Type</th>
                                    <td>{{$enquiry->payment_type}}
                                </tr>
                                <tr>
                                    <th>Will You Provide Food To Driver??</th>
                                    <td>{{$enquiry->food}}
                                </tr>
                                <tr>
                                    <th>Admin Commission</th>
                                    <td>{{$enquiry->admin_commission}}
                                </tr>
                                <tr>
                                    <th>Driver Commission</th>
                                    <td>{{$enquiry->driver_commission}}
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td>{{$enquiry->total_amount}}
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