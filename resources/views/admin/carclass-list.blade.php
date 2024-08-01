@extends('admin.layouts.app')

@section('content')

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>CarClass List</h4>
                            <div>
                                <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal"
                                    data-bs-target="#addCarClass">
                                    Add New
                                </a>
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
                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Id</th>
                                            <th style="text-align: center">Car Class Name</th>
                                            <th style="text-align: center">Car Class Image</th>
                                            <th style="text-align: center">Per Km Charges</th>
                                            <th style="text-align: center">Per Hour Charges</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($carclasses as $data)
                                        <tr>
                                            <td style="text-align: center">{{ $data->carclass_id }}</td>
                                            <td style="text-align: center">{{ $data->carclass_name }}</td>
                                            <td style="text-align: center"><img src="{{ asset('assets/carclass_images/' . $data->carclass_image) }}"
                                                    alt="Driver Image" /></td>
                                            <td style="text-align: center">{{ $data->per_km_charges }}</td>
                                            <td style="text-align: center">{{ $data->per_hour_charges }}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#updateCarClassModal"
                                                    data-id="{{ $data->carclass_id }}"
                                                    data-carclass-name="{{ $data->carclass_name }}"
                                                    data-per-km-charges="{{ $data->per_km_charges }}"
                                                    data-per-hour-charges="{{ $data->per_hour_charges}}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <form
                                                    action="{{ route('delete.carclass', ['carclass' => $data->carclass_id]) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this Carclass?')">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
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

<!-- Add Package Modal -->
<div class="modal fade @if ($errors->any()) show @endif" id="addCarClass" tabindex="-1"
    aria-labelledby="addCarClassLabel" aria-hidden="true" @if ($errors->any()) style="display: block;" @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarClassLabel">Add Car Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.carclass') }}" method="POST" id="addCarClassForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="carclass_name" class="form-label">Car Class Name</label>
                        <input type="text" class="form-control" id="carclass_name" name="carclass_name"
                            value="{{ old('carclass_name') }}">
                        @if ($errors->has('carclass_name'))
                        <div class="text-danger">
                            {{ $errors->first('carclass_name') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="carclass_image" class="form-label">Car Class Image</label>
                        <input type="file" class="form-control" id="carclass_image" name="carclass_image"
                            value="{{ old('carclass_image') }}">
                        @if ($errors->has('carclass_image'))
                        <div class="text-danger">
                            {{ $errors->first('carclass_image') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="per_km_charges" class="form-label">Per Km Charges</label>
                        <input type="text" class="form-control" id="per_km_charges" name="per_km_charges"
                            value="{{ old('per_km_charges') }}">
                        @if ($errors->has('per_km_charges'))
                        <div class="text-danger">
                            {{ $errors->first('per_km_charges') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="per_hour_charges" class="form-label">Per Hour Charges</label>
                        <input type="text" class="form-control" id="per_hour_charges" name="per_hour_charges"
                            value="{{ old('per_hour_charges') }}">
                        @if ($errors->has('per_hour_charges'))
                        <div class="text-danger">
                            {{ $errors->first('per_hour_charges') }}
                        </div>
                        @endif
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Car Class Modal -->
<div class="modal fade" id="updateCarClassModal" tabindex="-1" aria-labelledby="updateCarClassModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCarClassModalLabel">Update Carclass</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.carclass') }}" method="POST" id="updateCarClassForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="carclass_id" name="carclass_id">
                    <div class="mb-3">
                        <label for="update_carclass_name" class="form-label">Car Class Name</label>
                        <input type="text" class="form-control" id="update_carclass_name" name="carclass_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="update_carclass_image" class="form-label">Car Class Image</label>
                        <input type="file" class="form-control" id="update_carclass_image" name="carclass_image">
                    </div>
                    <div class="mb-3">
                        <label for="update_per_km_charges" class="form-label">Per Km Charges</label>
                        <input type="text" class="form-control" id="update_per_km_charges" name="per_km_charges">
                    </div>
                    <div class="mb-3">
                        <label for="update_per_hour_charges" class="form-label">Per Hour Charges</label>
                        <input type="text" class="form-control" id="update_per_hour_charges" name="per_hour_charges">
                    </div>
                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var updateCarClassModal = document.getElementById('updateCarClassModal');
    updateCarClassModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget || event.srcElement;
        var packageId = button.getAttribute('data-id');
        var packageName = button.getAttribute('data-carclass-name');
        var perKmCharges = button.getAttribute('data-per-km-charges');
        var perHourCharges = button.getAttribute('data-per-hour-charges');
        

        var form = updateCarClassModal.querySelector('#updateCarClassForm');
        form.querySelector('#carclass_id').value = packageId;
        form.querySelector('#update_carclass_name').value = packageName;
        form.querySelector('#update_per_km_charges').value = perKmCharges;
        form.querySelector('#update_per_hour_charges').value = perHourCharges;
      
    });

    @if($errors -> any())
    var myModal = new bootstrap.Modal(document.getElementById('addCarClass'));
    myModal.show();
    @endif
});
</script>

@endsection
