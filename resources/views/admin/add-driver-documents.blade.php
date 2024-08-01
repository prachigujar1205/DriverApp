@extends('admin.layouts.app')

@section('content')

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Add Documents</h4>
                            <div>
                                <a class="btn btn-sm btn-success" href="/dashboard">
                                    <i class="mdi mdi-home"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                           
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <form action="{{ route('add.driver.documents') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="driver_id"
                                    value="{{$driver->driver_id}}">

                                <div class="form-group">
                                    <label>Driving Licence</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info" name="driving_licence"
                                            placeholder="Upload Driving Licence">
                                    </div>
                                    @error('driving_licence')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Pan Card</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info" name="pan_card"
                                            placeholder="Upload Pan Card">
                                    </div>
                                    @error('pan_card')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Aadhar Card</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info" name="aadhar_card"
                                            placeholder="Upload Aadhar Card">
                                    </div>
                                    @error('aadhar_card')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Police Certification Report</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info"
                                            name="police_verification" placeholder="Upload Police Certification Report">
                                    </div>
                                    @error('police_verification')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Current Electricity Bill</label>
                                    <input type="file" name="electricity_bill" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info" name="electricity_bill"
                                            placeholder="Upload Current Electricity Bill">
                                    </div>
                                    @error('electricity_bill')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection