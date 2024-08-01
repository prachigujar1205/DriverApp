<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


{/* Admin Login Routes */}
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'getAdminLogin']);
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'postAdminLogin'])->name('login');
Route::get('/register',[App\Http\Controllers\AdminController::class, 'getRegister']);
Route::post('/register',[App\Http\Controllers\AdminController::class, 'postRegister'])->name('register');
Route::get('/adminLogout',[App\Http\Controllers\AdminController::class, 'logout']);

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'getDashboard']);

{/* Admin Profile Routes */}
Route::get('/view-admin-profile', [App\Http\Controllers\AdminController::class, 'getAdminProfile']);
Route::get('/edit-admin-profile', [App\Http\Controllers\AdminController::class, 'getEditProfile']);
Route::post('/edit-admin-profile', [App\Http\Controllers\AdminController::class, 'postEditProfile'])->name('update.admin.profile');
{/* Drivers Route */}
Route::get('/drivers-list', [App\Http\Controllers\AdminController::class, 'getDriversList']);
Route::get('/online-drivers-list', [App\Http\Controllers\AdminController::class, 'getOnlineDriversList']);
Route::get('/offline-drivers-list', [App\Http\Controllers\AdminController::class, 'getOfflineDriversList']);

Route::get('/add-new-driver', [App\Http\Controllers\AdminController::class, 'addDriver']);
Route::post('/add-new-driver', [App\Http\Controllers\AdminController::class, 'postDriver'])->name('store.driver');
Route::get('/edit-driver/{driver}', [App\Http\Controllers\AdminController::class, 'editDriver'])->name('edit.driver');
Route::post('/update-driver', [App\Http\Controllers\AdminController::class, 'updateDriver'])->name('update.driver');
Route::delete('/delete-driver/{driver}', [App\Http\Controllers\AdminController::class, 'deleteDriver'])->name('delete.driver');
Route::get('/add-documents/{driver}', [App\Http\Controllers\AdminController::class, 'getaddDocuments'])->name('add.documents');
Route::post('/add-documents', [App\Http\Controllers\AdminController::class, 'postaddDriverDocuments'])->name('add.driver.documents');
Route::get('/view-driver/{driver}',  [App\Http\Controllers\AdminController::class, 'viewDriver'])->name('view.driver.details');

{/* Carclasses Route */}
Route::get('/carclass-list', [App\Http\Controllers\AdminController::class, 'getCarClassList']);
Route::post('/carclass-list', [App\Http\Controllers\AdminController::class, 'postCarClass'])->name('add.carclass');
Route::post('/update-carclass', [App\Http\Controllers\AdminController::class, 'updateCarClass'])->name('update.carclass');
Route::delete('/delete-carclass/{carclass}', [App\Http\Controllers\AdminController::class, 'deleteCarClass'])->name('delete.carclass');

{/* Enquiries Routes */}
Route::get('/add-enquiry', [App\Http\Controllers\EnquiriesController::class, 'getAddEnquiry']);
Route::post('/add-enquiry', [App\Http\Controllers\EnquiriesController::class, 'postAddEnquiry'])->name('add.enquiry');
Route::get('/all-enquiries', [App\Http\Controllers\EnquiriesController::class, 'getAllEnquiry']);
Route::get('/view-enquiry/{enquiry}', [App\Http\Controllers\EnquiriesController::class, 'viewEnquiry'])->name('view.enquiry.details');
Route::post('/assign-driver', [App\Http\Controllers\EnquiriesController::class, 'assignDriver'])->name('assign.driver');
Route::post('/cancel-enquiry', [App\Http\Controllers\EnquiriesController::class, 'cancelEnquiry'])->name('cancel.enquiry');

{/* Customer Enquiry */}
Route::get('/add-customer-enquiry', [App\Http\Controllers\EnquiriesController::class, 'getCustomerEnquiry']);
Route::post('/add-customer-enquiry', [App\Http\Controllers\EnquiriesController::class,'postCustomerEnquiry'])->name('add.customer.enquiry');

Route::get('/confirmed-enquiries', [App\Http\Controllers\EnquiriesController::class, 'getConfirmedEnquiry']);
Route::get('/cancelled-enquiries', [App\Http\Controllers\EnquiriesController::class, 'getCancelledEnquiry']);


{/* Driver Login Routes */}
Route::get('/driver-login', [App\Http\Controllers\DriverController::class, 'getDriverLogin']);
Route::post('/driver-login', [App\Http\Controllers\DriverController::class, 'postDriverLogin'])->name('driver-login');
Route::get('/driverLogout',[App\Http\Controllers\DriverController::class, 'driverLogout']);
Route::get('/driver-dashboard', [App\Http\Controllers\DriverController::class, 'getDriverDashboard']);

{/* Driver Documents Routes */}
Route::get('/add-driver-documents', [App\Http\Controllers\DriverController::class, 'addDriverDocuments']);
Route::post('/store-driver-documents', [App\Http\Controllers\DriverController::class, 'postDriverDocuments'])->name('store.driver.documents');

{/* Driver Information Routes */}
Route::get('/view-driver-info', [App\Http\Controllers\DriverController::class, 'getDriverInfo']);
Route::get('/edit-driver-info/{driver}', [App\Http\Controllers\DriverController::class, 'editDriverInfo'])->name('edit.driver.info');
Route::post('/update-driver-info', [App\Http\Controllers\DriverController::class, 'updateDriverInfo'])->name('update.driver.info');

{/* Drivers Enquiries Routes */}
Route::get('/driver/all-enquiries', [App\Http\Controllers\DriverController::class, 'getDriverAllEnquiries']);
Route::get('/view-enquiry-details/{enquiry}', 'App\Http\Controllers\DriverController@viewEnquiryDetails')->name('view.enquiry');
Route::get('/driver/confirmed-enquiries', [App\Http\Controllers\DriverController::class, 'getDriverConfirmedEnquiry']);
Route::get('/driver/cancelled-enquiries', [App\Http\Controllers\DriverController::class, 'getDriverCancelledEnquiry']);
Route::post('/enquiries/{enquiry}', [App\Http\Controllers\DriverController::class, 'update'])->name('enquiries.update');
Route::post('/complete-enquiry', [App\Http\Controllers\DriverController::class, 'completeEnquiry'])->name('complete.enquiry');

Route::post('/accept-enquiry', [App\Http\Controllers\DriverController::class, 'acceptEnquiry'])->name('accept.enquiry');
Route::post('/decline-enquiry', [App\Http\Controllers\DriverController::class, 'declineEnquiry'])->name('decline.enquiry');