@extends('admin.layouts.app')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Package List</h4>
            <p class="card-description">
                <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#addPackage">
                    Add New
                </a>
                <a class="btn btn-sm btn-success" href="/dashboard">
                    Back
                </a>
            </p>
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
                            <th style="text-align: center">Monthly Package</th>
                            <th style="text-align: center">Price</th>
                            <th style="text-align: center">Base Price</th>
                            <th style="text-align: center">Created At</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $data)
                        <tr>
                            <td style="text-align: center">{{ $data->package_id }}</td>
                            <td style="text-align: center">{{ $data->package_name }}</td>
                            <td style="text-align: center">{{ $data->price }}</td>
                            <td style="text-align: center">{{ $data->base_price }}</td>
                            <td style="text-align: center">{{ $data->created_at }}</td>
                            <td style="text-align: center">
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-target="#updatePackageModal" data-id="{{ $data->package_id }}"
                                    data-package_name="{{ $data->package_name }}" data-price="{{ $data->price }}" data-base-price="{{ $data->base_price}}">
                                    <i class="mdi mdi-grease-pencil"></i>
                                </a>
                                <form action="{{ route('delete.package', ['package' => $data->package_id]) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this Package?')">
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

<!-- Add Package Modal -->
<div class="modal fade @if ($errors->any()) show @endif" id="addPackage" tabindex="-1" aria-labelledby="addPackageLabel"
    aria-hidden="true" @if ($errors->any()) style="display: block;" @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPackageLabel">Add Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.package') }}" method="POST" id="addPackageForm">
                    @csrf
                    <div class="mb-3">
                        <label for="package_name" class="form-label">Package Name</label>
                        <input type="text" class="form-control" id="package_name" name="package_name"
                            value="{{ old('package_name') }}">
                        @if ($errors->has('package_name'))
                        <div class="text-danger">
                            {{ $errors->first('package_name') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        @if ($errors->has('price'))
                        <div class="text-danger">
                            {{ $errors->first('price') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="base_price" class="form-label">Base Price</label>
                        <input type="text" class="form-control" id="base_price" name="base_price"
                            value="{{ old('base_price') }}">
                        @if ($errors->has('base_price'))
                        <div class="text-danger">
                            {{ $errors->first('base_price') }}
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Package Modal -->
<div class="modal fade" id="updatePackageModal" tabindex="-1" aria-labelledby="updatePackageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePackageModalLabel">Update Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.package')}}" method="POST" id="updatePackageForm">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="package_id" name="package_id">
                    <div class="mb-3">
                        <label for="update_package_name" class="form-label">Monthly Package</label>
                        <input type="text" class="form-control" id="update_package_name" name="package_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="update_price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="update_price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="update_base_price" class="form-label">Base Price</label>
                        <input type="text" class="form-control" id="update_base_price" name="base_price">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var updatePackageModal = document.getElementById('updatePackageModal');
    updatePackageModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget || event.srcElement;
        var packageId = button.getAttribute('data-id');
        var packageName = button.getAttribute('data-package_name');
        var price = button.getAttribute('data-price');
        var basePrice = button.getAttribute('data-base-price');
        
        var form = updatePackageModal.querySelector('#updatePackageForm');
        form.querySelector('#package_id').value = packageId;
        form.querySelector('#update_package_name').value = packageName;
        form.querySelector('#update_price').value = price;
        form.querySelector('#update_base_price').value = basePrice;
    });

    @if($errors->any())
    var myModal = new bootstrap.Modal(document.getElementById('addPackage'));
    myModal.show();
    @endif
});
</script>

@endsection
