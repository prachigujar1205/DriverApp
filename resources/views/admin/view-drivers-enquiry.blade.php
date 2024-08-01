@extends('admin.layouts.app')

@section('content')



<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Driver Enquiry Details</h4>
                        <a href="/driver-enquiries-list" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$driverEnquiry->first_name}} {{$driverEnquiry->last_name}}</td>
                                </tr>
                              
                                <tr>
                                    <th>Email</th>
                                    <td>{{$driverEnquiry->driver_email}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td>{{$driverEnquiry->mobile_no}}</td>
                                </tr>
                             
                                <tr>
                                    <th>Photo Document</th>
                                    <td>
                                         @if($driverEnquiry->profile_image != null) 
                                         <a onclick="viewImage({{ json_encode($driverEnquiry->profile_image) }})"> <img src="{{ asset('assets/driver_images'. '/'.$driverEnquiry->profile_image)}}" style="height:150px !important; width:150px !important; border-radius:0px"/></a>
                                        <br><br>
                                        <a class="btn btn-primary" href="{{ asset('assets/driver_images'. '/'.$driverEnquiry->profile_image)}}" download="Photo Document">Download
                                        </a>
                                        @else
                                        <p class="text-danger"><i>Photo document not uploded yet ..</i></p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Licence Document</th>
                                    <td>
                                         @if($driverEnquiry->driving_licence != null) 
                                         <a onclick="viewImage({{ json_encode($driverEnquiry->driving_licence) }})"><img src="{{asset('assets/driver_documents'. '/'.$driverEnquiry->driving_licence)}}" style="height:150px !important; width:150px !important; border-radius:0px"/></a>
                                        <br><br>
                                        <a class="btn btn-primary" href="{{asset('assets/driver_documents'. '/'.$driverEnquiry->driving_licence)}}" download="Licence">Download
                                        </a>
                                        @else
                                        <p class="text-danger"><i>Licence document not uploded yet ..</i></p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pan Card Document</th>
                                    <td>
                                        @if($driverEnquiry->pan_card != null) 
                                        <a onclick="viewImage({{ json_encode($driverEnquiry->pan_card) }})"><img src="{{asset('assets/driver_documents'. '/'.$driverEnquiry->pan_card)}}" style="height:150px !important; width:150px !important; border-radius:0px"/></a>
                                        <br><br>
                                        <a class="btn btn-primary" href="{{asset('assets/driver_documents'. '/'.$driverEnquiry->pan_card)}}" download="Pan card">Download
                                        </a>
                                        @else
                                        <p class="text-danger"><i>Pan card document not uploded yet ..</i></p>
                                        @endif
                                        </td>
                                </tr>
                                <tr>
                                  
                                    <th>Aadhar Card Document</th>
                                    <td>
                                        @if($driverEnquiry->aadhar_card != null) 
                                        <a onclick="viewImage({{ json_encode($driverEnquiry->aadhar_card) }})"><img src="{{asset('assets/driver_documents'. '/'.$driverEnquiry->aadhar_card)}}" style="height:150px !important; width:150px !important; border-radius:0px"/></a>
                                        <br><br><a class="btn btn-primary" href="{{asset('assets/driver_documents'. '/'.$driverEnquiry->aadhar_card)}}" download="Aadhar Card">Download</a>
                                        @else
                                        <p class="text-danger"><i>Aadhar card document not uploded yet ..</i></p>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>Police Verification Report</th>
                                    <td>
                                         @if($driverEnquiry->police_verification != null) 
                                         <a onclick="viewImage({{ json_encode($driverEnquiry->police_verification) }})"><img src="{{asset('assets/driver_documents'. '/'.$driverEnquiry->police_verification)}}" style="height:150px !important; width:150px !important; border-radius:0px"/></a>
                                        <br><br>
                                        <a class="btn btn-primary" href="{{asset('assets/driver_documents'. '/'.$driverEnquiry->police_verification)}}" download="Police Verification Report">Download
                                        </a>
                                        @else
                                        <p class="text-danger"><i>Police verification report document not uploded yet ..</i></p>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>Current address electricity Bill</th>
                                    <td>
                                         @if($driverEnquiry->electricity_bill != null) 
                                         <a onclick="viewImage({{ json_encode($driverEnquiry->electricity_bill) }})"> <img src="{{asset('assets/driver_documents'. '/'.$driverEnquiry->electricity_bill)}}" style="height:150px !important; width:150px !important; border-radius:0px"/></a>
                                        <br><br>
                                        <a class="btn btn-primary" href="{{asset('assets/driver_documents'. '/'.$driverEnquiry->electricity_bill)}}" download="Current addres electricity Bill">Download
                                        </a>
                                        @else
                                        <p class="text-danger"><i>Current addres electricity bill document not uploded yet ..</i></p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       
      
    </div>
</div>

<div class="modal fade" id="viewImage" tabindex="-1" role="dialog" aria-labelledby="editCarclassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarclassModalLabel">Driver Documents</h5>
                <button type="button" class="close" onclick="closeModal('viewImage')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCarclassForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                      <div class="form-group">
                        <img id="viewImageData" src="" style="height:auto !important; width:100% !important;" />
                    </div>
                  </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
<script>
 function viewImage(driver_documents) {
        //console.log(carclass);

        document.getElementById('viewImageData').src = `./driver_documents/${driver_documents}`;
       

        // Show the modal
        $('#viewImage').modal('show');
    }

    function closeModal(modalId) {
        $('#' + modalId).modal('hide');
    }

</script>

@endsection
