@extends('admin.layouts.app')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Days List</h4>
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
                            <th style="text-align: center">Id</th>
                            <th style="text-align: center">Number of Days</th>
                            <th style="text-align: center">Price</th>
                            <th style="text-align: center">Created At</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($days as $data)
                        <tr>
                            <td style="text-align: center">{{ $data->id }}</td>
                            <td style="text-align: center">{{ $data->no_of_days }}</td>
                            <td style="text-align: center">{{ $data->price }}</td>
                            <td style="text-align: center">{{ $data->created_at }}</td>

                            <td style="text-align: center">
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-target="#updateDaysModal" data-id="{{ $data->id }}"
                                    data-no_of_days="{{ $data->no_of_days }}" data-price="{{ $data->price }}">
                                    <i class="mdi mdi-grease-pencil"></i>
                                </a>
                                <!-- <form action="{{ route('delete.day', ['day' => $data->id]) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this day?')">
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

<!-- Add Days Modal -->
<!-- <div class="modal fade @if ($errors->any()) show @endif" id="addDays" tabindex="-1" aria-labelledby="addDaysLabel"
    aria-hidden="true" @if ($errors->any()) style="display: block;" @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDaysLabel">Add Day</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.day') }}" method="POST" id="addDaysForm">
                    @csrf
                    <div class="mb-3">
                        <label for="no_of_days" class="form-label">Number of Days</label>
                        <input type="text" class="form-control" id="no_of_days" name="no_of_days"
                            value="{{ old('no_of_days') }}">
                        @if ($errors->has('no_of_days'))
                        <div class="text-danger">
                            {{ $errors->first('no_of_days') }}
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
</div> -->

<!-- Update Days Modal -->
<div class="modal fade" id="updateDaysModal" tabindex="-1" aria-labelledby="updateDaysModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateDaysModalLabel">Update Day</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.days')}}" method="POST" id="updateDaysForm">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <label for="update_no_of_days" class="form-label">Number of Days</label>
                        <input type="text" class="form-control" id="update_no_of_days" name="no_of_days" readonly>
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
    var updateDaysModal = document.getElementById('updateDaysModal');
    updateDaysModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var dayId = button.getAttribute('data-id');
        var noOfDays = button.getAttribute('data-no_of_days');
        var price = button.getAttribute('data-price');
        
        var form = updateDaysModal.querySelector('#updateDaysForm');
        form.querySelector('#id').value = dayId;
        form.querySelector('#update_no_of_days').value = noOfDays;
        form.querySelector('#update_price').value = price;
    });

    @if ($errors->any())
    var addDaysModal = new bootstrap.Modal(document.getElementById('addDays'));
    addDaysModal.show();
    @endif
});
</script>

@endsection
