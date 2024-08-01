<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Days;
use App\Models\Hours;
use App\Models\Packages;
use App\Models\Enquiries;
use App\Models\Driver;
use App\Models\CarClass;
use App\Models\Customer;
use Carbon\Carbon;

class EnquiriesController extends Controller
{
    public function getAddEnquiry(Request $request)
    {
        $drivers = Driver::all();
        // $packages = Packages::all();
        $carclasses = Carclass::all();
        $customer = Customer::first();
        
        return view('enquiries.add-enquiry', compact('drivers','carclasses','customer'));
    }
    
    public function postAddEnquiry(Request $request)
    {
        $pickupLocation = $request->input('pickup_location');
        $dropLocation = $request->input('drop_location');
        $pickupTime = $request->input('pickup_time');
        $dropTime = $request->input('drop_time');
        $tripType = $request->input('trip_type');
        $vehicleClass = $request->input('vehicle_class');
        $paymentMethod = $request->input('payment_type');
       
        // dD($paymentMethod);
    
        $totalHours = 0;
        $totalAmount = 0;
    
        if ($tripType == 'Round') {
            try {
                // Adjusting time format to handle AM/PM
                $pickupTimeCarbon = Carbon::createFromFormat('h:i A', $pickupTime);
                $dropTimeCarbon = Carbon::createFromFormat('h:i A', $dropTime);
    
                // Calculate the difference in hours, ensuring drop time is later than pickup time
                $totalHours = $pickupTimeCarbon->diffInHours($dropTimeCarbon);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Invalid time format.');
            }
        }
    
        $carClass = Carclass::where('carclass_name', $vehicleClass)->first();
        if (!$carClass) {
            return redirect()->back()->with('error', 'Invalid vehicle class selected.');
        }
    
        if ($tripType == 'One Way') {
            // $distance = $this->getDistance($pickupLocation, $dropLocation); 
            $distance = 154;
            $totalAmount = $carClass->per_km_charges * $distance;
        } elseif ($tripType == 'Round') { 
            $totalAmount = $carClass->per_hour_charges * $totalHours;
        }
    
        // Apply discount if payment type is online
        if ($paymentMethod == 'Online') {
            $discount = $totalAmount * 0.05; // 5% discount
            $totalAmount -= $discount;
        }
    
        // Save the enquiry
        $enquiry = new Enquiries();
        $enquiry->customer_name = $request->input('customer_name');
        $enquiry->customer_email = $request->input('customer_email');
        $enquiry->mobile_no = $request->input('mobile_no');
        $enquiry->alternate_mobile_no = $request->input('alternate_mobile_no');
        $enquiry->address = $request->input('address');
        $enquiry->pincode = $request->input('pincode');
        $enquiry->trip_type = $request->input('trip_type');
        $enquiry->pickup_location = $pickupLocation;
        $enquiry->drop_location = $dropLocation;
        $enquiry->pickup_date = $request->input('pickup_date');
        $enquiry->pickup_time = $pickupTime;
        $enquiry->drop_date = $request->input('drop_date');
        $enquiry->drop_time = $dropTime;
        $enquiry->food = $request->input('food');
        $enquiry->payment_type = $request->input('payment_type');
        $enquiry->vehicle_type = $request->input('vehicle_type');
        $enquiry->vehicle_class = $vehicleClass;
       
        $enquiry->total_amount = $totalAmount;
      
        if ($tripType == 'One Way') {
            $enquiry->total_distance = $distance;
        } elseif ($tripType == 'Round') {
            $enquiry->total_hours = $totalHours;
        }
    
        $enquiry->enquiry_status = 1;
    
        $enquiry->save();
        // dd($enquiry);
    
        return redirect('/all-enquiries')->with('success', 'Enquiry added successfully.');
    }
    
    

    public function getDistance($pickupLocation, $dropLocation)
    {
        $apiKey = 'AIzaSyDUkMVVi6QljBfyIuIVsE8MbkgEzu9C0P0';
    
        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'origins' => $pickupLocation,
            'destinations' => $dropLocation,
            'key' => $apiKey
        ]);
    
        $data = $response->json();
    
        if (isset($data['rows'][0]['elements'][0]['distance']['value'])) {
            $distanceInMeters = $data['rows'][0]['elements'][0]['distance']['value'];
            // Convert distance to kilometers
            return $distanceInMeters / 1000;
        }
        return 0; // Return 0 or handle the error accordingly
    }

    public function viewEnquiry($enquiry_id)
    {
        // dd($enquiry_id);
        $enquiry = Enquiries::find($enquiry_id);
        // dd($enquiry);
        return view('admin.view-enquiry', compact('enquiry'));
    }
    
    public function assignDriver(Request $request)
    {
        $request->validate([
            'enquiry_id' => 'required|exists:enquries,enquiry_id',
            'driver_id' => 'required',
            'driver_id.*' => 'exists:drivers,driver_id',
        ]);

        $enquiry = Enquiries::find($request->enquiry_id);
        $enquiry->driver_id = $request->driver_id;
        $enquiry->enquiry_status = 2;
        $enquiry->driver_assigned = true;
        $enquiry->save();

      
        return redirect('/all-enquiries')->with('success', 'Driver Assigned Successfully');
    }

    public function cancelEnquiry(Request $request)
    {
        $enquiry = Enquiries::find($request->enquiry_id);
        if ($enquiry) {
            $enquiry->enquiry_status = 5;
            $enquiry->save();
    
            return redirect('/all-enquiries')->with('success', 'Enquired Cancelled Successfully!!');
        }
    
        return response()->json(['success' => false, 'message' => 'Enquiry not found']);
    }

    public function getAllEnquiry(Request $request)
    {
        $drivers = Driver::where('driver_status', 3)->get();
        $allEnquiries = Enquiries::orderBy('created_at', 'desc')->get();


        return view('enquiries.all-enquiries', compact('allEnquiries','drivers'));
    }

    public function getConfirmedEnquiry(Request $request)
    {
        $confirmedEnquiries = Enquiries::where('enquiry_status', 2)->get();
        return view('enquiries.confirmed-enquiries', compact('confirmedEnquiries'));
    }

    public function getCancelledEnquiry(Request $request)
    {
        $cancelledEnquiries = Enquiries::where('enquiry_status', 4)->get();
        return view('enquiries.cancelled-enquiries', compact('cancelledEnquiries'));
    }
    

    //Customer Enquiry
    public function getCustomerEnquiry(Request $request)
    {
        $carclasses = CarClass::all();
        return view('enquiries.add-customer-enquiry', compact('carclasses'));
    }

    public function postCustomerEnquiry(Request $request)
    {
        $pickupLocation = $request->input('pickup_location');
        $dropLocation = $request->input('drop_location');
        $pickupTime = $request->input('pickup_time');
        $dropTime = $request->input('drop_time');
        $tripType = $request->input('trip_type');
        $vehicleClass = $request->input('vehicle_class');
        $paymentMethod = $request->input('payment_type');
       
        // dD($paymentMethod);
    
        $totalHours = 0;
        $totalAmount = 0;
    
        if ($tripType == 'Round') {
            try {
                // Adjusting time format to handle AM/PM
                $pickupTimeCarbon = Carbon::createFromFormat('h:i A', $pickupTime);
                $dropTimeCarbon = Carbon::createFromFormat('h:i A', $dropTime);
    
                // Calculate the difference in hours, ensuring drop time is later than pickup time
                $totalHours = $pickupTimeCarbon->diffInHours($dropTimeCarbon);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Invalid time format.');
            }
        }
    
        $carClass = Carclass::where('carclass_name', $vehicleClass)->first();
        if (!$carClass) {
            return redirect()->back()->with('error', 'Invalid vehicle class selected.');
        }
    
        if ($tripType == 'One Way') {
            // $distance = $this->getDistance($pickupLocation, $dropLocation); 
            $distance = 154;
            $totalAmount = $carClass->per_km_charges * $distance;
        } elseif ($tripType == 'Round') { 
            $totalAmount = $carClass->per_hour_charges * $totalHours;
        }
    
        // Apply discount if payment type is online
        if ($paymentMethod == 'Online') {
            $discount = $totalAmount * 0.05; // 5% discount
            $totalAmount -= $discount;
        }
    
        // Save the enquiry
        $enquiry = new Enquiries();
        $enquiry->customer_name = $request->input('customer_name');
        $enquiry->customer_email = $request->input('customer_email');
        $enquiry->mobile_no = $request->input('mobile_no');
        $enquiry->alternate_mobile_no = $request->input('alternate_mobile_no');
        $enquiry->address = $request->input('address');
        $enquiry->pincode = $request->input('pincode');
        $enquiry->trip_type = $request->input('trip_type');
        $enquiry->pickup_location = $pickupLocation;
        $enquiry->drop_location = $dropLocation;
        $enquiry->pickup_date = $request->input('pickup_date');
        $enquiry->pickup_time = $pickupTime;
        $enquiry->drop_date = $request->input('drop_date');
        $enquiry->drop_time = $dropTime;
        $enquiry->food = $request->input('food');
        $enquiry->payment_type = $request->input('payment_type');
        $enquiry->vehicle_type = $request->input('vehicle_type');
        $enquiry->vehicle_class = $vehicleClass;
       
        $enquiry->total_amount = $totalAmount;
    
        if ($tripType == 'One Way') {
            $enquiry->total_distance = $distance;
        } elseif ($tripType == 'Round') {
            $enquiry->total_hours = $totalHours;
        }
    
        $enquiry->enquiry_status = 1;
    
        $enquiry->save();
    
        return redirect('/all-enquiries')->with('success', 'Enquiry added successfully.');
    }
    
    

}