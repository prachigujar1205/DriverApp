<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Models\Enquiries;
use App\Models\Carclass;
use Hash;
use Auth;


class AdminController extends Controller
{
    public function getAdminLogin(Request $request)
    {
        return view('admin.auth.login');
    }

    public function postAdminLogin(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            return redirect('dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'Please enter valid email or password']);
        }
    }

    public function getRegister(Request $request)
    {
        return view('admin.auth.register');
    }

    public function postRegister(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
      
        $users->save();
        return redirect('/admin')->with('success', 'User Registered successfully!');

    }

    public function logout(){
        Auth::logout();
        return redirect(url('/admin'));
    }

    public function getDashboard()
    {
        $allDrivers = Driver::count();
        $verificationPendingDrivers = Driver::where('driver_status', 1)->count();
        $unVerifiedDrivers = Driver::where('driver_status', 2)->count();
        $onlineDrivers = Driver::where('driver_status', 3)->count();
        $offlineDrivers = Driver::where('driver_status', 4)->count();

        $allEnquries = Enquiries::count();
        $confirmedEnquiry = Enquiries::where('enquiry_status', 2)->count();
        $cancelledEnquiry = Enquiries::where('enquiry_status', 3)->count();
        return view('admin.dashboard', compact('allDrivers','verificationPendingDrivers','unVerifiedDrivers','onlineDrivers','offlineDrivers','allEnquries','confirmedEnquiry','cancelledEnquiry'));
    }

    public function getAdminProfile(Request $request)
    {
        return view('admin.profile.view-profile');
    }

    public function getEditProfile(Request $request)
    {
        return view('admin.profile.edit-profile');
    }

    public function postEditProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'mobile_no' => 'required|string|max:15',
        ]);
    
        $adminProfile = User::find($request->id);
    
        if (!$adminProfile) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        $adminProfile->name = $request->name;
        $adminProfile->email = $request->email;
        $adminProfile->mobile_no = $request->mobile_no;
    
        if ($request->password) {
            $adminProfile->password = Hash::make($request->password);
        }
        $adminProfile->save();
    
        return redirect('/dashboard')->with('success', 'Profile Updated Successfully!!');
    }
    

    public function getDriversList(Request $request)
    {
        $drivers = Driver::orderBy('created_at', 'desc')->get();
        return view('admin.drivers-list', compact('drivers'));
    }

    public function getOnlineDriversList(Request $request)
    {
        $drivers = Driver::where('driver_status', 3)->get();
        return view('admin.online-drivers-list', compact('drivers'));
    }

    public function getOfflineDriversList(Request $request)
    {
        $drivers = Driver::where('driver_status', 4)->get();
        return view('admin.offline-drivers-list', compact('drivers'));
    }

    public function addDriver(Request $request)
    {
        $carclasses = CarClass::all();
        return view('admin.add-driver', compact('carclasses'));
    }

    public function postDriver(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'driver_email' => 'required|string|email|max:255|unique:drivers,driver_email',
            'mobile_no' => 'required|string|max:15',
            'alternate_mobile_no' => 'nullable|string|max:15',
            'address' => 'required|string|max:500',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $drivers = new Driver;
    
        $drivers->first_name = $request->first_name;
        $drivers->last_name = $request->last_name;
        $drivers->driver_email = $request->driver_email;
        $drivers->mobile_no = $request->mobile_no;
        $drivers->alternate_mobile_no = $request->alternate_mobile_no;
        $drivers->address = $request->address;
        $drivers->country = $request->country;
        $drivers->state = $request->state;
        $drivers->city = $request->city;
        $drivers->pincode = $request->pincode;
        $drivers->gear_type = $request->gear_type;
        $drivers->car_name = $request->car_name;
        $drivers->password = Hash::make($request->password);
        $drivers->driver_status = 0;
    
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/driver_images'), $imageName);
            $drivers->profile_image = $imageName;
        }
        $drivers->save();
    
        return redirect('/drivers-list')->with('success', 'Driver Added Successfully');
    }
    

    public function editDriver($driver_id)
    {
        $driver= Driver::find($driver_id);
        return view('admin.edit-driver', compact('driver')); 
    }

    public function updateDriver(Request $request)
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

     return redirect('/drivers-list')->with('success', 'Driver Updated Successfully');

    }

    public function getaddDocuments($driver_id)
    {
        $driver= Driver::find($driver_id);
        return view('admin.add-driver-documents', compact('driver'));
    }


    public function postaddDriverDocuments(Request $request)
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
        return redirect('/drivers-list')->with('success', 'Documents Added Successfully');
    }

    public function deleteDriver($driver_id)
    {
        $driver = Driver::find($driver_id);
        if (!$driver) {
            return redirect()->back()->with('error', 'Driver not found.');
        }
        $driver->delete();
        return redirect('/drivers-list')->with('success', 'Driver deleted successfully.');
    }

    public function viewDriver($driver_id)
    {
        $driver = Driver::find($driver_id);
        return view('admin.view-driver-details', compact('driver'));
    }

    public function getCarClassList(Request $request)
    {
        $carclasses = Carclass::orderBy('created_at', 'desc')->get();
        return view('admin.carclass-list', compact('carclasses'));
    }

    public function postCarClass(Request $request)
    {
        $carclass = new Carclass;

        $carclass->carclass_name = $request->carclass_name;

        if ($request->hasFile('carclass_image')) {
            $image = $request->file('carclass_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/carclass_images'), $imageName);
            $carclass->carclass_image = $imageName;
        }

        $carclass->per_km_charges = $request->per_km_charges;
        $carclass->per_hour_charges = $request->per_hour_charges;

        $carclass->save();
        return redirect('/carclass-list')->with('success', 'Car Class Added Successfully!!');

    }

    public function updateCarClass(Request $request)
    {
        $dataId = $request->carclass_id;
        $carclass = Carclass::find($dataId);

        $carclass->carclass_name = $request->carclass_name;
        $carclass->per_km_charges = $request->per_km_charges;
        $carclass->per_hour_charges = $request->per_hour_charges;
      


        // Handle image upload
        if ($request->hasFile('carclass_image')) {
            $image = $request->file('carclass_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/carclass_images'), $imageName);
            $carclass->carclass_image = $imageName;
        }

        $carclass->save();
        // dd($carclass);

        return redirect('/carclass-list')->with('success', 'Car Class Updated Successfully');
    }

    public function deleteCarClass($carclass_id)
    {
        $carclass = Carclass::find($carclass_id);
        if (!$carclass) {
            return redirect()->back()->with('error', 'Car Class not found.');
        }
        $carclass->delete();
        return redirect('/carclass-list')->with('success', 'Car Class deleted successfully.');
    }


}