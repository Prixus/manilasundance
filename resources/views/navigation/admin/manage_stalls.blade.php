@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Manage Stalls<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					</h2>
          <div class="table-responsive">

		  <button style = "background-color:red;float:right;margin:5px;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/admin/bazaar">Back</a></button>
          <button style = "background-color:#337ab7;float:right;margin:5px;" type="button" class="btn btn-primary" id="BtnAdd">Add Stall</button>

            <table class="table table-striped" id="StallTable">
              <thead>
                <tr>
                  <th>Stall ID</th>
                  <th>Stall Rental Cost</th>
                  <th>Stall Booking Cost</th>
                  <th>Stall Type</th>
                  <th>Stall Status</th>
                </tr>
                      {{ csrf_field() }}
              </thead>
              <tbody>
                @foreach($stalls as $stall)
                <tr id = "Stall{{$stall->PK_StallID}}">
                  <td>{{$stall->PK_StallID}}</td>
                  <td>{{$stall->Stall_RentalCost}}</td>
                  <td>{{$stall->Stall_BookingCost}}</td>
                  <td>{{$stall->Stall_Type}}</td>
                  <td>{{$stall->Stall_Size}}</td>
                  <td>{{$stall->Stall_Status}}</td>
				          <td>
                    <button id = "BtnDelete" style = "background-color:red;margin-left:5px;" type="button" class="btn btn-primary" data-id="{{$stall->PK_StallID}}" data-rentalcost="{{$stall->Stall_RentalCost}}" data-bookingcost="{{$stall->Stall_BookingCost}}" data-type="{{$stall->Stall_Type}}" data-size = "{{$stall->Stall_Size}}" data-status = "{{$stall->Stall_Status}}">Delete</button>
                    <button id = "BtnEdit" style = "background-color:green;" type="button" class="btn btn-primary" data-id="{{$stall->PK_StallID}}" data-rentalcost="{{$stall->Stall_RentalCost}}" data-bookingcost="{{$stall->Stall_BookingCost}}" data-type="{{$stall->Stall_Type}}" data-size = "{{$stall->Stall_Size}}" data-status = "{{$stall->Stall_Status}}">Edit</button>
                  </td>
                </tr>

                @endforeach
                {{$stalls->links()}}
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

    <!-- This is the Modal that will be called for add column -->
    <div class = "modal fade" id = "ModalAdd" role = "dialog">
      <div class = "modal-dialog">

        <div class="modal-content">
          <div class = "modal-header">
            <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                  <h4 class ="modal-title">Stall Registration </h4>
                </div>
                <div class="modal-body">
                  <form style="text-align:center">
                    <!--
                    <div class = "form-group">
                      <label> Stall ID: </label>
                      <input type="text" placeholder="Enter Stall ID" id="AddUsername" required>
                    </div>
                  -->
                    <div class="form-group">
                      <label> Stall Rental Cost</label>
                      <input type= "number" step ="0.01" min="1" id="AddStallRentalCost" required>
                    </div>

                      <div class = "form-group">
                      <label> Stall Booking Cost </label>
                      <input type= "number" step ="0.01" min="1" id="AddStallBookingCost" required>
                    </div>

                    <div class = "form-group">
                    <label> Stall Type </label>
                    <select id="AddStallType">
                      <option value="Regular">Regular</option>
                      <option value="Prime">Prime</option>
                      <option value="Food">Food</option>
                    </select>
                  </div>

                <div class = "form-group">
                  <label> Stall Size </label>
                  <select id="AddStallSize">
                    <option value="2x3 m">2x3 m</option>
                    <option value="2x2 m">2x2 m</option>
                  </select>
                </div>

                  <div class = "form-group">
                  <label> Stall Status </label>
                  <select id="AddStallStatus">
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                  </select>
                </div>

                </form>
                </div>
                <div class = "modal-footer">
                  <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitAdd">Add Stall </button>
                  <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                </div>
              </div>
        </div>
      </div>


          <!-- This is the Modal that will be called for edit column -->
          <div class = "modal fade" id = "ModalEdit" role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                        <h4 class ="modal-title">Stall Registration </h4>
                      </div>
                      <div class="modal-body">
                        <form style="text-align:center">

                          <div class = "form-group">
                            <label> Stall ID: </label>
                            <input type="text" id="EditStallID" disabled>
                          </div>

                          <div class="form-group">
                            <label> Stall Rental Cost</label>
                            <input type= "number" step ="0.01" min="1" id="EditStallRentalCost" required>
                          </div>

                            <div class = "form-group">
                            <label> Stall Booking Cost </label>
                            <input type= "number" step ="0.01" min="1" id="EditStallBookingCost" required>
                          </div>

                          <div class = "form-group">
                          <label> Stall Type </label>
                          <select id="EditStallType">
                            <option value="Regular">Regular</option>
                            <option value="Prime">Prime</option>
                            <option value="Food">Food</option>
                          </select>
                        </div>

                      <div class = "form-group">
                        <label> Stall Size </label>
                        <select id="EditStallSize">
                          <option value="2x3 m">2x3 m</option>
                          <option value="2x2 m">2x2 m</option>
                        </select>
                      </div>

                        <div class = "form-group">
                        <label> Stall Status </label>
                        <select id="EditStallStatus">
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                      </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitEdit">Edit Stall </button>
                        <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                      </div>
                    </div>
              </div>
            </div>

            <!-- This is the Modal that will be called for edit column -->
            <div class = "modal fade" id = "ModalDelete" role = "dialog">
              <div class = "modal-dialog">

                <div class="modal-content">
                  <div class = "modal-header">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
                          <h4 class ="modal-title">Stall Registration </h4>
                        </div>
                        <div class="modal-body">
                          <form style="text-align:center">

                            <div class = "form-group">
                              <label> Stall ID: </label>
                              <input type="text" placeholder="Enter Stall ID" id="DeleteStallID" disabled>
                            </div>

                            <div class="form-group">
                              <label> Stall Rental Cost</label>
                              <input type= "number" step ="0.01" min="1" id="DeleteStallRentalCost" disabled>
                            </div>

                              <div class = "form-group">
                              <label> Stall Booking Cost </label>
                              <input type= "number" step ="0.01" min="1" id="DeleteStallBookingCost" disabled>
                            </div>

                            <div class = "form-group">
                            <label> Stall Type </label>
                            <select id="DeleteStallType" disabled>
                              <option value="Regular">Regular</option>
                              <option value="Prime">Prime</option>
                              <option value="Food">Food</option>
                            </select>
                          </div>

                        <div class = "form-group">
                          <label> Stall Size </label>
                          <select id="DeleteStallSize">
                            <option value="2x3 m">2x3 m</option>
                            <option value="2x2 m">2x2 m</option>
                          </select>
                        </div>

                          <div class = "form-group">
                          <label> Stall Status </label>
                          <select id="DeleteStallStatus">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                          </select>
                        </div>

                        </form>
                        </div>
                        <div class = "modal-footer">
                          <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitDelete">Delete Stall </button>
                          <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                        </div>
                      </div>
                </div>
              </div>


              <script type="text/javascript">
              var BazaarID = {{ Session::get('BazaarID') }} ;

                $(document).ready(function(){

                    $(document).on('click','#BtnAdd',function(){
                      $('#ModalAdd').modal('show');
                    });

                    $('.modal-footer').on('click','#SubmitAdd',function()
                    {
                      $.ajax({
                        type: 'POST',
                        url: '/admin/manage_stalls',
                        data: {
                          '_token': $('input[name=_token]').val(),
                          'rentalcost': $('#AddStallRentalCost').val(),
                          'bookingcost': $('#AddStallBookingCost').val(),
                          'type': $('#AddStallType').val(),
                          'status': $('#AddStallStatus').val(),
                          'size': $('#AddStallSize').val(),
                          'bazaarID' : BazaarID

                        },
                        success: function(response){
                          if(response.errrors){
                            toastr.error('Validation error', 'Error Alert', {timeOut:5000});
                          }
                          else{
                            toastr.success('Successfully Added Stall', 'Success Alert', {timeOut:5000});
                            $('#StallTable').prepend("<tr id = 'Stall" + response.PK_StallID + "'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Size + "</td><td>" + response.Stall_Status + "</td><td><button id='BtnDelete' style = 'background-color:red;margin-left:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Delete</button><button id= 'BtnDelete' style = 'background-color:green;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Edit</button></td></tr>");
                          }

                        }
                      });
                    });

                    $(document).on('click','#BtnEdit', function(){
                      id = ($(this).data('id'));
                      $('#EditStallID').val($(this).data('id'));
                      $('#EditStallRentalCost').val($(this).data('rentalcost'));
                      $('#EditStallBookingCost').val($(this).data('bookingcost'));
                      $('#EditStallType').val($(this).data('type'));
                      $('#EditStallSize').val($(this).data('size'));
                      $('#EditStallStatus').val($(this).data('status'));
                      $('#EditStallStatus').val($(this).data('status'));
                      $('#ModalEdit').modal('show');
                    });

                    $('.modal-footer').on('click','#SubmitEdit',function(){
                      $.ajax({
                        type: "PUT",
                        url: '/admin/manage_stalls/' + id,
                        data: {
                          '_token': $('input[name=_token]').val(),
                          'rentalcost': $('#EditStallRentalCost').val(),
                          'bookingcost': $('#EditStallBookingCost').val(),
                          'type': $('#EditStallType').val(),
                          'size': $('#EditStallSize').val(),
                          'status': $('#EditStallStatus').val(),
                        },
                        success: function(response){
                          if(response.errrors){
                            toastr.error('Validation Error','Error Alert', {timeOut:5000});
                          }
                          else{
                            toastr.success('Successfully Edit Stall Information', 'Success Alert', {timeOut:5000});
                            $('#Stall' + response.PK_StallID).replaceWith("<tr id = 'Stall" + response.PK_StallID + "'><td>" + response.PK_StallID + "</td><td>" + response.Stall_RentalCost + "</td><td>" + response.Stall_BookingCost + "</td><td>" + response.Stall_Type + "</td><td>" + response.Stall_Size + "</td><td>" + response.Stall_Status + "</td><td><button id='BtnDelete' style = 'background-color:red;margin-left:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Delete</button><button id= 'BtnDelete' style = 'background-color:green;' type='button' class='btn btn-primary' data-id='" + response.PK_StallID + "' data-rentalcost='" + response.Stall_RentalCost + "'  data-bookingcost='" + response.Stall_BookingCost + "' data-type='" + response.Stall_Type + "' data-size = '" + response.Stall_Size + "' data-status = '" + response.Stall_Status + "'>Edit</button></td></tr>");
                          }

                        }

                      });
                    });

                    $(document).on('click','#BtnDelete', function(){
                      id = ($(this).data('id'));
                      $('#DeleteStallID').val($(this).data('id'));
                      $('#DeleteStallRentalCost').val($(this).data('rentalcost'));
                      $('#DeleteStallBookingCost').val($(this).data('bookingcost'));
                      $('#DeleteStallType').val($(this).data('type'));
                      $('#DeleteStallSize').val($(this).data('size'));
                      $('#DeleteStallStatus').val($(this).data('status'));
                      $('#ModalDelete').modal('show');

                    });

                    $('.modal-footer').on('click','#SubmitDelete',function(){
                      $.ajax({
                        type: "Delete",
                        url:'/admin/manage_stalls/' + id,
                        data:{
                          '_token': $('input[name=_token]').val()
                        },
                        success: function(response){
                          toastr.error('Deleting Successful', 'Delete Alert', {timeOut:5000})
                          $('#Stall' + response.PK_StallID).remove();
                        }
                      });
                    });
                });
              </script>

@endsection
