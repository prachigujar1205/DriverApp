@extends('admin.layouts.app')

@section('content')

<style>
.btn-group.trip-btn {
    background-color: #fff !important;
}

.btn-group.trip-btn .btn {
    border: 1px solid #000;
    border-radius: 3px;
}

.btn-group.trip-btn .btn:hover {
    background-color: #007bff;
    color: #ffffff;
    border-color: #007bff;
}

.btn-group.trip-btn .btn.active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

.btn-primary {
    color: black;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn.active {
    background-color: #3c4858 !important;
    color: #fff;
    border-color: #007bff;
}

.car_li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.car_item {
    border: 2px solid #000;
    border-radius: 8px;
    padding: 10px;
    margin: 5px;
    flex: 1;
    max-width: 200px;
    box-sizing: border-box;
}

.car_item.selected {
    border: 2px solid #007bff;
}

.car_img {
    text-align: center;
}

.car_text {
    text-align: center;
}
</style>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Add Enquiry</h4>
                            <div>
                                <a class="btn btn-sm btn-success" href="/all-enquiries">
                                    <i class="mdi mdi-home"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="multiStepForm" method="POST" action="{{ route('add.customer.enquiry') }}">
                                @csrf

                                <input type="hidden" name="trip_type" id="trip_type" value="One Way">
                                <input type="hidden" name="vehicle_type" id="vehicle_type" value="Manual">
                                <input type="hidden" name="vehicle_class" id="vehicle_class">

                                <!-- Step 1 -->
                                <div class="container" id="step_1" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:40px;">
                                            <div class="btn-group trip-btn" id="trip-btn" name="trip_type">
                                                <a href="#" type="button" class="btn" data-trip-type="One Way">ONE WAY
                                                    TRIP</a>
                                                <a href="#" type="button" class="btn" data-trip-type="Round">ROUND
                                                    TRIP</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4" id="pickup_location_div">
                                            <div id="pick_up_forntinput" class="geocoder">
                                                <input type="text" class="form-control" placeholder="Pickup Location"
                                                    name="pickup_location" id="pickup_location"
                                                    aria-label="Pickup Location">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4" id="drop_location_div">
                                            <div id="dropp_off_forntinput" class="geocoder">
                                                <input type="text" class="form-control" placeholder="Drop Location"
                                                    name="drop_location" id="drop_location" aria-label="Drop Location">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <button type="button" class="btn btn-primary mt-4" id="next_to_step_2"
                                                style="float: right;">Book Driver</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="container" id="step_2" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:40px;">
                                            <div class="btn-group trip-btn" id="transmission-btn" name="vehicle_type">
                                                <a type="button" class="btn" data-transmission-type="Manual">Manual</a>
                                                <a type="button" class="btn"
                                                    data-transmission-type="Automatic">Automatic</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 car_li mt-4">
                                            @foreach($carclasses as $carclass)
                                            <div class="car_item" data-car-name="{{ $carclass->carclass_name }}">
                                                <div class="car_img">
                                                    <center>
                                                        <img src="{{ asset('assets/carclass_images/' . $carclass->carclass_image) }}"
                                                            alt="Driver in Pune" style="width: 100px;">
                                                    </center>
                                                </div>
                                                <div class="car_text">
                                                    <center>
                                                        <span>{{ $carclass->carclass_name }}</span>
                                                    </center>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6 mt-4" id="pickup_date_div">
                                            <div id="pick_up_forntinput" class="geocoder">
                                                <label for="pickup_date_temp">Pickup Date</label>
                                                <select name="pickup_date" id="pickup_date_temp" class="form-control">
                                                    <option value="">Pickup date</option>
                                                    @for ($i = 0; $i <= 14; $i++) <option
                                                        value="{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}">
                                                        {{ $i == 0 ? 'Today' : ($i == 1 ? 'Tomorrow' : \Carbon\Carbon::now()->addDays($i)->format('d-F-Y')) }}
                                                        </option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4" id="pickup_time_div">
                                            <div id="dropp_off_forntinput" class="geocoder">
                                                <label for="pickup_time">Pickup Time</label>
                                                <select class="form-control" id="pickup_time" name="pickup_time">
                                                    <option value="">Select a time</option>
                                                    @php
                                                    $times = [];
                                                    $start = strtotime('00:00');
                                                    $end = strtotime('23:45');
                                                    for ($time = $start; $time <= $end; $time=strtotime('+15 minutes',
                                                        $time)) { $formattedTime=date('g:i A', $time);
                                                        $times[]=$formattedTime; } @endphp @foreach($times as $time)
                                                        <option value="{{ $time }}">{{ $time }}</option>
                                                        @endforeach
                                                </select>
                                                @error('pickup_time')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- New drop date and drop time fields -->
                                        <div class="col-md-6 mt-4" id="drop_date_div" style="display: none;">
                                            <div id="drop_off_forntinput" class="geocoder">
                                                <label for="drop_date_temp">Drop Date</label>
                                                <select name="drop_date" id="drop_date_temp" class="form-control">
                                                    <option value="">Drop date</option>
                                                    @for ($i = 0; $i <= 14; $i++) <option
                                                        value="{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}">
                                                        {{ $i == 0 ? 'Today' : ($i == 1 ? 'Tomorrow' : \Carbon\Carbon::now()->addDays($i)->format('d-F-Y')) }}
                                                        </option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4" id="drop_time_div" style="display: none;">
                                            <div id="drop_off_forntinput" class="geocoder">
                                                <label for="drop_time">Drop Time</label>
                                                <select class="form-control" id="drop_time" name="drop_time">
                                                    <option value="">Select a time</option>
                                                    @foreach($times as $time)
                                                    <option value="{{ $time }}">{{ $time }}</option>
                                                    @endforeach
                                                </select>
                                                @error('drop_time')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4" id="food_div" style="display: none;">
                                            <div id="food_forntinput" class="geocoder">
                                                <label for="drop_time">Will you provide food to driver ?</label>
                                                <select class="form-control" id="food" name="food">
                                                    <option value="">Will You Provide Food To Driver</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                @error('food')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <button type="button" class="btn btn-primary mt-4" id="next_to_step_3"
                                                style="float: right;">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div class="container" id="step_3" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-center mb-0 tbl">
                                                <tbody id="cart_tbl">
                                                    <tr>
                                                        <th><i id="back_2" class="fa fa-arrow-circle-left"
                                                                aria-hidden="true" style="font-size: 25px;"></i></th>
                                                        <th id="td_1">TRIP DETAILS</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Trip Type</th>
                                                        <td id="td_trip_type"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pick up location</th>
                                                        <td id="td_pickup_location"></td>
                                                    </tr>
                                                    <tr id="tr_drop_location">
                                                        <th>Drop location</th>
                                                        <td id="td_drop_location"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pick up Date</th>
                                                        <td id="td_pickup_date"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pick up Time</th>
                                                        <td id="td_pickup_time"></td>
                                                    </tr>
                                                    <tr id="tr_drop_date">
                                                        <th>Drop Date</th>
                                                        <td id="td_drop_date"></td>
                                                    </tr>
                                                    <tr id="tr_drop_time">
                                                        <th>Drop Time</th>
                                                        <td id="td_drop_time"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Vehicle Type</th>
                                                        <td id="td_vehicle_type"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Vehicle Class</th>
                                                        <td id="td_vehicle_class"></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <button type="button" class="btn btn-primary" id="next_to_step_4"
                                                style="float: right;">Next</button>
                                        </div>
                                    </div>
                                </div>


                                <!-- Step 4 -->
                                <div class="container" id="step_4" style="display: none;">
                                    <div class="row">
                                        <h2 class="text-center">Personal Information</h2>
                                        <div class="col-md-12">
                                            <div class="card">

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="full_name">Full Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="customer_name" placeholder="Enter full name"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email_address">Email Address</label>
                                                                <input type="email" class="form-control"
                                                                    name="customer_email"
                                                                    placeholder="Enter email address" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobile_number">Mobile Number</label>
                                                                <input type="text" class="form-control" name="mobile_no"
                                                                    placeholder="Enter Mobile Number" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobile_number">Alternate Mobile
                                                                    Number</label>
                                                                <input type="text" class="form-control"
                                                                    name="alternate_mobile_no"
                                                                    placeholder="Enter Alternate Mobile number"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobile_number">Address</label>
                                                                <input type="text" class="form-control" name="address"
                                                                    placeholder="Enter address" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobile_number">Pin Code</label>
                                                                <input type="text" class="form-control" name="pincode"
                                                                    placeholder="Enter Pin Code" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <button type="submit" class="btn btn-primary"
                                                                style="float:right;">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tripTypeBtns = document.querySelectorAll('#trip-btn .btn');
    const transmissionBtns = document.querySelectorAll('#transmission-btn .btn');
    const carItems = document.querySelectorAll('.car_item');

    const tripTypeInput = document.getElementById('trip_type');
    const vehicleTypeInput = document.getElementById('vehicle_type');
    const vehicleClassInput = document.getElementById('vehicle_class');

    const nextToStep2Btn = document.getElementById('next_to_step_2');
    const nextToStep3Btn = document.getElementById('next_to_step_3');
    const nextToStep4Btn = document.getElementById('next_to_step_4');
    const backToStep2Btn = document.getElementById('back_2');

    const step1Div = document.getElementById('step_1');
    const step2Div = document.getElementById('step_2');
    const step3Div = document.getElementById('step_3');
    const step4Div = document.getElementById('step_4');

    const pickupDateDiv = document.getElementById('pickup_date_div');
    const pickupTimeDiv = document.getElementById('pickup_time_div');
    const dropDateDiv = document.getElementById('drop_date_div');
    const dropTimeDiv = document.getElementById('drop_time_div');
    const dropLocationDiv = document.getElementById('drop_location_div');
    const foodDiv = document.getElementById('food_div');

    function validateStep1() {
        const pickupLocation = document.getElementById('pickup_location').value;
        const tripType = tripTypeInput.value;

        if (!pickupLocation || !tripType) {
            alert('All Fields are required.');
            return false;
        }

        return true;
    }

    function validateStep2() {
        if (!vehicleTypeInput.value || !vehicleClassInput.value) {
            alert('Please select vehicle type and class.');
            return false;
        }
        return true;
    }

    function validateStep3() {
        const pickupDate = document.getElementById('pickup_date_temp').value;
        const pickupTime = document.getElementById('pickup_time').value;

        if (!pickupDate || !pickupTime) {
            alert('Please select pickup date and time.');
            return false;
        }
        if (tripTypeInput.value === 'Round') {
            const dropDate = document.getElementById('drop_date_temp').value;
            const dropTime = document.getElementById('drop_time').value;
            if (!dropDate || !dropTime) {
                alert('Please select drop date and time for round trips.');
                return false;
            }
        }
        return true;
    }

    function updateStep3Summary() {
        document.getElementById('td_trip_type').textContent = tripTypeInput.value;
        document.getElementById('td_pickup_location').textContent = document.getElementById('pickup_location')
            .value;
        const dropLocationValue = document.getElementById('drop_location').value;
        document.getElementById('td_drop_location').textContent = dropLocationValue;
        document.getElementById('td_pickup_date').textContent = document.getElementById('pickup_date_temp')
            .value;
        document.getElementById('td_pickup_time').textContent = document.getElementById('pickup_time').value;
        document.getElementById('td_drop_date').textContent = document.getElementById('drop_date_temp').value;
        document.getElementById('td_drop_time').textContent = document.getElementById('drop_time').value;
        document.getElementById('td_vehicle_type').textContent = vehicleTypeInput.value;
        document.getElementById('td_vehicle_class').textContent = vehicleClassInput.value;

        const isRoundTrip = tripTypeInput.value === 'Round';
        const isOneWay = tripTypeInput.value === 'One Way';

        document.getElementById('tr_drop_location').style.display = (isRoundTrip || dropLocationValue) ?
            'table-row' : 'none';
        document.getElementById('tr_drop_date').style.display = isRoundTrip ? 'table-row' : 'none';
        document.getElementById('tr_drop_time').style.display = isRoundTrip ? 'table-row' : 'none';
    }

    tripTypeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tripTypeBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            tripTypeInput.value = this.getAttribute('data-trip-type');

            if (tripTypeInput.value === 'One Way') {
                dropDateDiv.style.display = 'none';
                dropTimeDiv.style.display = 'none';
                dropLocationDiv.style.display = 'block';
                foodDiv.style.display = 'none';
            } else {
                dropDateDiv.style.display = 'block';
                dropTimeDiv.style.display = 'block';
                dropLocationDiv.style.display = 'none';
                foodDiv.style.display = 'block';
            }
        });
    });

    transmissionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            transmissionBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            vehicleTypeInput.value = this.getAttribute('data-transmission-type');
        });
    });

    carItems.forEach(item => {
        item.addEventListener('click', function() {
            carItems.forEach(i => i.classList.remove('selected'));
            this.classList.add('selected');
            vehicleClassInput.value = this.getAttribute('data-car-name');
        });
    });

    nextToStep2Btn.addEventListener('click', function() {
        if (validateStep1()) {
            step1Div.style.display = 'none';
            step2Div.style.display = 'block';
        }
    });

    nextToStep3Btn.addEventListener('click', function() {
        if (validateStep2()) {
            step2Div.style.display = 'none';
            step3Div.style.display = 'block';
            updateStep3Summary();
        }
    });

    nextToStep4Btn.addEventListener('click', function() {
        if (validateStep3()) {
            step3Div.style.display = 'none';
            step4Div.style.display = 'block';
        }
    });

    backToStep2Btn.addEventListener('click', function() {
        step3Div.style.display = 'none';
        step2Div.style.display = 'block';
    });
});
</script>

@endsection