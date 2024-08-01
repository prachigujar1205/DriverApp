@extends('admin.layouts.app')

@section('content')
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
                            <form class="forms-sample" action="{{ route('add.enquiry') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Customer Name</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        name="customer_name" placeholder="Enter Your Name"
                                        value="{{ $customer->customer_name }}" readonly>
                                    @error('customer_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputUsername1"
                                        name="customer_email" placeholder="Enter Your Email"
                                        value="{{ $customer->customer_email }}" readonly>
                                    @error('customer_email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Mobile Number</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="mobile_no"
                                        placeholder="Enter Your Mobile Number" value="{{ $customer->mobile_no }}"
                                        readonly>
                                    @error('mobile_no')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Alternate Mobile Number</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        name="alternate_mobile_no" placeholder="Enter Your Alternate Mobile Number"
                                        value="{{ $customer->alternate_mobile_no }}" readonly>
                                    @error('alternate_mobile_no')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Address</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="address"
                                        placeholder="Enter Your Address" value="{{ $customer->address }}" readonly>
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Pincode</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="pincode"
                                        placeholder="Enter Your Pincode" value="{{ $customer->pincode }}" readonly>
                                    @error('pincode')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trip_type">Select Trip Type</label>
                                    <select name="trip_type" id="trip_type" class="form-control">
                                        <option value="" selected>-- Select Trip Type --</option>
                                        <option value="One Way" {{ old('trip_type') == 'One Way' ? 'selected' : '' }}>
                                            One Way Trip
                                        </option>
                                        <option value="Round" {{ old('trip_type') == 'Round' ? 'selected' : '' }}>Round
                                            Trip
                                        </option>
                                    </select>
                                    @error('trip_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="form-group col-md-6" id="pickupLocation" style="display: none;">
                                        <label for="pickup_location">Pickup Location</label>
                                        <input type="text" class="form-control" id="pickup_location"
                                            name="pickup_location" placeholder="Enter Pickup Location"
                                            value="{{ old('pickup_location') }}">
                                        @error('pickup_location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6" id="dropLocation" style="display: none;">
                                        <label for="drop_location">Drop Location</label>
                                        <input type="text" class="form-control" id="drop_location" name="drop_location"
                                            placeholder="Enter Drop Location" value="{{ old('drop_location') }}">
                                        @error('drop_location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="form-group col-md-6" id="pickupDate" style="display: none;">
                                        <label for="pickup_date_temp">Pickup Date</label>
                                        <select name="pickup_date" id="pickup_date_temp" class="form-control">
                                            <option value="">Pickup date</option>
                                            @for ($i = 0; $i <= 14; $i++) <option
                                                value="{{ \Carbon\Carbon::now()->addDays($i)->format('d-F-Y') }}">
                                                {{ $i == 0 ? 'Today' : ($i == 1 ? 'Tomorrow' : \Carbon\Carbon::now()->addDays($i)->format('d-F-Y')) }}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>

                                    @php
                                    $times = [];
                                    $start = strtotime('00:00');
                                    $end = strtotime('23:45');

                                    for ($time = $start; $time <= $end; $time=strtotime('+15 minutes', $time)) {
                                        $formattedTime=date('g:i A', $time); $times[]=$formattedTime; } @endphp <div
                                        class="form-group col-md-6" id="pickupTime" style="display: none;">
                                        <label for="pickup_time">Pickup Time</label>
                                        <select class="form-control" id="pickup_time" name="pickup_time">
                                            <option value="">Select a time</option>
                                            @foreach($times as $time)
                                            <option value="{{ $time }}"
                                                {{ old('pickup_time') == $time ? 'selected' : '' }}>{{ $time }}</option>
                                            @endforeach
                                        </select>
                                        @error('pickup_time')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-6" id="dropDate" style="display: none;">
                                <label for="drop_date_temp">Drop Date</label>
                                <select name="drop_date" id="drop_date_temp" class="form-control">
                                    <option value="">Drop date</option>
                                    @for ($i = 0; $i <= 14; $i++) <option
                                        value="{{ \Carbon\Carbon::now()->addDays($i)->format('d-F-Y') }}">
                                        {{ $i == 0 ? 'Today' : ($i == 1 ? 'Tomorrow' : \Carbon\Carbon::now()->addDays($i)->format('d-F-Y')) }}
                                        </option>
                                        @endfor
                                </select>
                            </div>

                            <div class="form-group col-md-6" id="dropTime" style="display: none;">
                                <label for="drop_time">Drop Time</label>
                                <select class="form-control" id="drop_time" name="drop_time">
                                    <option value="">Select a time</option>
                                    @foreach($times as $time)
                                    <option value="{{ $time }}" {{ old('drop_time') == $time ? 'selected' : '' }}>
                                        {{ $time }}</option>
                                    @endforeach
                                </select>
                                @error('drop_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group" id="driverFood" style="display: none;">
                            <label for="food">Will you Provide Food To Driver</label>
                            <select name="food" id="food" class="form-control">
                                <option value="" selected>-- Will You Provide Food To Driver--</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('food')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vehicle_type">Select Vehicle Type</label>
                            <select name="vehicle_type" id="vehicle_type" class="form-control">
                                <option value="" selected>-- Select Vehicle Type --</option>
                                <option value="Manual" {{ old('vehicle_type') == 'Manual' ? 'selected' : '' }}>
                                    Manual
                                </option>
                                <option value="Automatic" {{ old('vehicle_type') == 'Automatic' ? 'selected' : '' }}>
                                    Automatic
                                </option>
                            </select>
                            @error('vehicle_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vehicle_class">Select Vehicle Class</label>
                            <select name="vehicle_class" id="vehicle_class" class="form-control">
                                <option value="" selected>-- Select Vehicle Class --</option>
                                @foreach($carclasses as $carclass)
                                <option value="{{ $carclass->carclass_name }}">{{ $carclass->carclass_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('vehicle_class')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="payment_type">Payment Method</label>
                            <select name="payment_type" id="payment_type" class="form-control">
                                <option value="" selected>-- Select Payment Method --</option>
                                <option value="Online" {{ old('payment_type') == 'Online' ? 'selected' : '' }}>
                                    Online
                                </option>
                                <option value="Offline" {{ old('payment_type') == 'Offline' ? 'selected' : '' }}>Offline
                                </option>
                            </select>
                            @error('payment_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUkMVVi6QljBfyIuIVsE8MbkgEzu9C0P0&libraries=places">
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const tripTypeSelect = document.getElementById("trip_type");
    const pickupLocationDiv = document.getElementById("pickupLocation");
    const dropLocationDiv = document.getElementById("dropLocation");
    const pickupDateDiv = document.getElementById("pickupDate");
    const pickupTimeDiv = document.getElementById("pickupTime");
    const dropDateDiv = document.getElementById("dropDate");
    const dropTimeDiv = document.getElementById("dropTime");
    const driverFoodDiv = document.getElementById("driverFood");


    const pickupDateTemp = document.getElementById("pickup_date_temp");
    const dropupDateTemp = document.getElementById("drop_date_temp");
    const pickupTimeSelect = document.getElementById("pickup_time");
    const dropTimeSelect = document.getElementById("drop_time");

    function initializeAutocomplete() {
        const pickupLocationInput = document.getElementById("pickup_location");
        const dropLocationInput = document.getElementById("drop_location");

        if (pickupLocationInput && dropLocationInput) {
            const pickupAutocomplete = new google.maps.places.Autocomplete(pickupLocationInput);
            const dropAutocomplete = new google.maps.places.Autocomplete(dropLocationInput);

            pickupAutocomplete.addListener('place_changed', function() {
                const place = pickupAutocomplete.getPlace();
                // You can handle the place details here
                console.log('Pickup Place:', place);
            });

            dropAutocomplete.addListener('place_changed', function() {
                const place = dropAutocomplete.getPlace();
                // You can handle the place details here
                console.log('Drop Place:', place);
            });
        }
    }

    // Call initializeAutocomplete after the DOM is fully loaded
    initializeAutocomplete();

    function updatePickupTimeOptions() {
        const selectedDate = pickupDateTemp.value;
        const today = new Date();
        const selectedDateTime = new Date(selectedDate);

        if (selectedDateTime.toDateString() === today.toDateString()) {
            const currentTime = today.getHours() * 60 + today.getMinutes();
            const times = [];
            for (let time = 0; time < 1440; time += 15) {
                if (time >= currentTime) {
                    const hours = Math.floor(time / 60).toString().padStart(2, '0');
                    const minutes = (time % 60).toString().padStart(2, '0');
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    const displayHours = hours % 12 || 12;
                    times.push(`${displayHours}:${minutes} ${ampm}`);
                }
            }
            pickupTimeSelect.innerHTML = '<option value="">Select a time</option>';
            times.forEach(time => {
                const option = document.createElement("option");
                option.value = time;
                option.textContent = time;
                pickupTimeSelect.appendChild(option);
            });
        } else {
            pickupTimeSelect.innerHTML = `<option value="">Select a time</option>
                    @foreach($times as $time)
                    <option value="{{ $time }}">{{ $time }}</option>
                    @endforeach`;
        }
    }

    function updateDropTimeOptions() {
        const selectedDate = dropupDateTemp.value;
        const today = new Date();
        const selectedDateTime = new Date(selectedDate);

        if (selectedDateTime.toDateString() === today.toDateString()) {
            const currentTime = today.getHours() * 60 + today.getMinutes();
            const times = [];
            for (let time = 0; time < 1440; time += 15) {
                if (time >= currentTime) {
                    const hours = Math.floor(time / 60).toString().padStart(2, '0');
                    const minutes = (time % 60).toString().padStart(2, '0');
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    const displayHours = hours % 12 || 12;
                    times.push(`${displayHours}:${minutes} ${ampm}`);
                }
            }
            dropTimeSelect.innerHTML = '<option value="">Select a time</option>';
            times.forEach(time => {
                const option = document.createElement("option");
                option.value = time;
                option.textContent = time;
                dropTimeSelect.appendChild(option);
            });
        } else {
            dropTimeSelect.innerHTML = `<option value="">Select a time</option>
                    @foreach($times as $time)
                    <option value="{{ $time }}">{{ $time }}</option>
                    @endforeach`;
        }
    }

    pickupDateTemp.addEventListener("change", updatePickupTimeOptions);
    dropupDateTemp.addEventListener("change", updateDropTimeOptions);

    tripTypeSelect.addEventListener("change", function() {
        const selectedTripType = tripTypeSelect.value;

        if (selectedTripType === "One Way") {
            pickupLocationDiv.style.display = "block";
            dropLocationDiv.style.display = "block";
            pickupDateDiv.style.display = "block";
            pickupTimeDiv.style.display = "block";
            dropDateDiv.style.display = "none";
            dropTimeDiv.style.display = "none";
            driverFoodDiv.style.display = "none";
        } else if (selectedTripType === "Round") {
            pickupLocationDiv.style.display = "block";
            dropLocationDiv.style.display = "none";
            pickupDateDiv.style.display = "block";
            pickupTimeDiv.style.display = "block";
            dropDateDiv.style.display = "block";
            dropTimeDiv.style.display = "block";
            driverFoodDiv.style.display = "block";
        } else {
            pickupLocationDiv.style.display = "none";
            dropLocationDiv.style.display = "none";
            pickupDateDiv.style.display = "none";
            pickupTimeDiv.style.display = "none";
            dropDateDiv.style.display = "none";
            dropTimeDiv.style.display = "none";
            driverFoodDiv.style.display = "none";
        }
    });

    tripTypeSelect.dispatchEvent(new Event("change"));
});
</script>

@endsection