@extends('admin.layouts.app')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Hours List</h4>
            <p class="card-description">
              
                <a class="btn btn-success" href="/dashboard"><i class="mdi mdi-home me-2"></i>Back</a>
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
                            <th style="text-align:center;">Id</th>
                            <th style="text-align:center;">Number of Hours</th>
                            <th style="text-align:center;">Price</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hours as $data)
                        <tr>
                            <td style="text-align:center;">{{ $data->id }}</td>
                            <td style="text-align:center;">{{ $data->no_of_hours }}</td>
                            <td style="text-align:center;">{{ $data->price }}</td>
                            <td style="text-align: center">
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-target="#updateHoursModal" data-id="{{ $data->id }}"
                                    data-no_of_hours="{{ $data->no_of_hours }}" data-price="{{ $data->price }}">
                                    <i class="mdi mdi-grease-pencil"></i>
                                </a>
                                <!-- <form action="{{ route('delete.hours', ['hour' => $data->id]) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this hour?')">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Hours Modal -->
<div class="modal fade @if ($errors->any()) show @endif" id="addHours" tabindex="-1" aria-labelledby="addHoursLabel"
    aria-hidden="true" @if ($errors->any()) style="display: block;" @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHoursLabel">Add Hours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.hour') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="no_of_hours" class="form-label">Number of Hours</label>
                        <input type="text" class="form-control" id="no_of_hours" name="no_of_hours"
                            value="{{ old('no_of_hours') }}">
                        @if ($errors->has('no_of_hours'))
                        <div class="text-danger">
                            {{ $errors->first('no_of_hours') }}
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Hours Modal -->
<div class="modal fade" id="updateHoursModal" tabindex="-1" aria-labelledby="updateHoursModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateHoursModalLabel">Update Hours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.hours')}}" method="POST" id="updateHoursForm">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <label for="update_no_of_hours" class="form-label">Number of Hours</label>
                        <input type="text" class="form-control" id="update_no_of_hours" name="no_of_hours" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="update_price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="update_price" name="price">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var updateHoursModal = document.getElementById('updateHoursModal');
    updateHoursModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var hourId = button.getAttribute('data-id');
        var noOfHours = button.getAttribute('data-no_of_hours');
        var price = button.getAttribute('data-price');
        
        var form = updateHoursModal.querySelector('#updateHoursForm');
        form.querySelector('#id').value = hourId;
        form.querySelector('#update_no_of_hours').value = noOfHours;
        form.querySelector('#update_price').value = price;
    });

    @if ($errors->any())
    var addHoursModal = new bootstrap.Modal(document.getElementById('addHours'));
    addHoursModal.show();
    @endif
});
</script>

@endsection