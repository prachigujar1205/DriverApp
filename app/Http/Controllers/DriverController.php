<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Driver;
use App\Models\Enquiries;

class DriverController extends Controller
{
    public function getDriverLogin(Request $request)
    {
        return view('driver.auth.login');
    }

    public function postDriverLogin(Request $request)
    {
        $remember = $request->has('remember');
        if (Auth::guard('driver')->attempt(['driver_email' => $request->driver_email, 'password' => $request->password], $remember)) {
            return redirect('driver-dashboard');
        } else {
            return redirect()->back()->with('error', 'Please enter valid email or password');
        }
    }

    public function driverLogout()
    {
        Auth::guard('driver')->logout();
        return redirect('/driver-login');
    }

    public function getDriverDashboard()
    {
        $driverId = Auth::guard('driver')->user()->driver_id;

        // dd($driverId);
        $driver = Driver::where('driver_id', $driverId)->get();
        $allEnquiriesCount = Enquiries::where('driver_id', $driverId)->count();

        $acceptedEnquiriesCount = Enquiries::where('driver_id', $driverId)
                                            ->where('enquiry_status', 4)
                                            ->count();

        $completedEnquiriesCount = Enquiries::where('driver_id', $driverId)
                                                ->where('enquiry_status', 3)
                                                ->count();
                                                
        $cancelledEnquiriesCount = Enquiries::where('driver_id', $driverId)
                                            ->where('enquiry_status', 5)
                                            ->count();


        return view('driver.dashboard',compact('driver','allEnquiriesCount','acceptedEnquiriesCount','completedEnquiriesCount','cancelledEnquiriesCount'));
    }

    public function addDriverDocuments(Request $request)
    {
        return view('driver.add-documents');
    }

    public function postDriverDocuments(Request $request)
    {
        $dataId = $request->driver_id;
        $driver = Driver::findOrFail($dataId);

        $validated = $request->validate([
            'driving_licence' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'pan_card' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'aadhar_card' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'police_verification' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'electricity_bill' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($request->hasFile('driving_licence')) {
            $image = $request->file('driving_licence');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/driver_documents'), $imageName);
            $driver->driving_licence = $imageName;
        }

        if ($request->hasFile('pan_card')) {
            $image = $request->file('pan_card');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/driver_documents'), $imageName);
            $driver->pan_card = $imageName;
        }

        if ($request->hasFile('aadhar_card')) {
            $image = $request->file('aadhar_card');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/driver_documents'), $imageName);
            $driver->aadhar_card = $imageName;
        }

        if ($request->hasFile('police_verification')) {
            $image = $request->file('police_verification');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/driver_documents'), $imageName);
            $driver->police_verification = $imageName;
        }

        if ($request->hasFile('electricity_bill')) {
            $image = $request->file('electricity_bill');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/driver_documents'), $imageName);
            $driver->electricity_bill = $imageName;
        }

        $driver->driver_status = 1;

        $driver->save();

        return redirect('/view-driver-info')->with('success', 'Documents Added Successfully');
    }

    public function getDriverInfo(Request $request)
    {
        $driver_id = Auth::guard('driver')->user()->driver_id;
        $driver = Driver::find($driver_id);
        return view('driver.view-driver-info', compact('driver'));
    }

    public function editDriverInfo($driver_id)
    {
        $driver = Driver::find($driver_id);
        return view('driver.edit-driver-info', compact('driver'));
    }

    public function updateDriverInfo(Request $request)
    {
        $dataId = $request->driver_id;
        $driver = Driver::find($dataId);

        $driver->first_name= $request->first_name;
        $driver->last_name= $request->last_name;
        $driver->driver_email= $request->driver_email;
        $driver->mobile_no= $request->mobile_no;
        $driver->alternate_mobile_no= $request->alternate_mobile_no;
        $driver->address= $request->address;
        $driver->country= $request->country;
        $driver->state= $request->state;
        $driver->city= $request->city;
        $driver->pincode= $request->pincode;
        $driver->driver_status= $request->driver_status;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/driver_images'), $imageName);
            $driver->profile_image = $imageName;
        }
        $driver->save();

     return redirect('/view-driver-info')->with('success', 'Driver Info Updated Successfully');

    }

    public function getDriverAllEnquiries(Request $request)
    {
        $driverId = Auth::guard('driver')->user()->driver_id;
        $allEnquiries = Enquiries::where('driver_id', $driverId)->get();
        return view('driver.all-enquiries', compact('allEnquiries'));
    }

    public function viewEnquiryDetails($enquiry_id)
    {
        $enquiries = Enquiries::findOrFail($enquiry_id); 
        return view('driver.view-enquiry-details', compact('enquiries'));
    }

    
    public function completeEnquiry(Request $request)
    {
        $enquiry = Enquiries::find($request->enquiry_id);
        if ($enquiry) {
            $enquiry->enquiry_status = 3;
            $enquiry->save();
    
            return redirect('/driver/all-enquiries')->with('success', 'Enquired Completed Successfully!!');
        }
        return response()->json(['success' => false, 'message' => 'Enquiry not found']);
    }
    
    public function getDriverConfirmedEnquiry(Request $request)
    {
        $driverId = Auth::guard('driver')->user()->driver_id;
        $confirmedEnquiries = Enquiries::where('enquiry_status', 3)
                                        ->where('driver_id', $driverId)
                                        ->get();
    
        return view('driver.confirmed-enquiries', compact('confirmedEnquiries'));
    }
    

    public function getDriverCancelledEnquiry(Request $request)
    {
        $driverId = Auth::guard('driver')->user()->driver_id;
        $cancelledEnquiries = Enquiries::where('enquiry_status', 5)
                                        ->where('driver_id', $driverId)
                                        ->get();

        return view('driver.cancelled-enquiries', compact('cancelledEnquiries'));
    }

    public function acceptEnquiry(Request $request)
    {
        $enquiry = Enquiries::find($request->enquiry_id);
        // dd($enquiry);
        if ($enquiry) {
            $enquiry->enquiry_status = 4;
            $enquiry->save();
    
            return redirect('/driver/all-enquiries')->with('success', 'Enquiry Accepted Successfully!!');
        }
        return response()->json(['success' => false, 'message' => 'Enquiry not found']);
    }

    public function declineEnquiry(Request $request)
    {
        $enquiry =  Enquiries::find($request->enquiry_id);
        // dd($enquiry);
        if($enquiry) {
            $enquiry->enquiry_status = 1;
            $enquiry->save();

            return redirect('/driver/all-enquiries')->with('success', 'Enquiry Cancelled Successfully!');
        }
        return response()->json(['success' => false, 'message' => 'Enquiry not found']);
    }
}