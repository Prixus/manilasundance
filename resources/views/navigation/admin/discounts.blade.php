@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Discounts<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					</h2>

          <div class="table-responsive">
		  <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Add Discount</button></h2>

            <table id ="DiscountTable" class="table table-striped">
              <thead>
                <tr>
					<th>Discount ID</th>
					<th>Discount Name</th>
                    <th>Discount Amount</th>
					<th>Description</th>
                </tr>
                {{csrf_field()}}
              </thead>
              <tbody>
                @foreach($discounts as $discount)
                <tr id="Discount{{$discount->PK_DiscountID}}">
					<td>{{$discount->PK_DiscountID}}</td>
					<td>{{$discount->Discount_Name}}</td>
					<td>{{$discount->Discount_Requirements}}</td>
          <td>{{$discount->Discount_ValidDateStart}}</td>
          <td>{{$discount->Discount_ValidDateEnd}}</td>
          <td>{{$discount->Discount_ValidTimeStart}}<td>
          <td>{{$discount->Discount_ValidTimeEnd}}</td>
          <td>{{$discount->Discount_Amount}}</td>
					<td>
                        <button id = "btnDelete" style = "background-color:red;" type="button" class="btn btn-primary" data-id="{{$discount->PK_DiscountID}}" data-name = "{{$discount->Discount_Name}}" data-requirement="{{$discount->Discount_Requirements}}" data-datestart ="{{$discount->Discount_ValidDateStart}}" data-dateend = "{{$discount->Discount_ValidDateEnd}}" data-timestart="{{$discount->Discount_ValidTimeStart}}" data-timeend = "{{$discount->Discount_ValidTimeEnd}}" data-amount = "{{$discount->Discount_Amount}}">Delete</button>
                        <button id = "btnEdit" style = "background-color:green;margin-right:5px;" type="button" class="btn btn-primary" data-id="{{$discount->PK_DiscountID}}" data-name = "{{$discount->Discount_Name}}" data-requirement="{{$discount->Discount_Requirements}}" data-datestart ="{{$discount->Discount_ValidDateStart}}" data-dateend = "{{$discount->Discount_ValidDateEnd}}" data-timestart="{{$discount->Discount_ValidTimeStart}}" data-timeend = "{{$discount->Discount_ValidTimeEnd}}" data-amount = "{{$discount->Discount_Amount}}">Edit</button>
                    </td>
                </tr>
                @endforeach
				</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

		<!-- This is the Modal that will be called for add column -->
      <div class = "modal fade" id = "modalAdd" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">Discount</h4>
                  </div>
                  <div class="modal-body">
                    <form style="text-align:center">
                      <div class = "form-group">
                        <label> Discount Name: </label>
                        <input type="text" name ="txtDiscountName" id="AddDiscountName" required>
                      </div>
                      <div class="form-group">
                        <div>
                        <label> Discount Requirements: </label>
                      </div>
                        <textarea rows="4" cols="50" name="txtDiscountRequirements" id="AddDiscountRequirements"></textarea>
                      </div>
                      <div class = "form-group">
                        <label> Discount Validity date start: </label>
                        <input type="date" name = "txtDiscountDateStart" id="AddDiscountDateStart" required>
                      </div>
					            <div class = "form-group">
                        <label> Discount Validity date end: </label>
                        <input type="date" name = "txtDiscountDateEnd" id="AddDiscountDateEnd" required>
                      </div>
					            <div class = "form-group">
                        <label> Discount Validity time start: </label>
                        <input type="time" name = "txtTimeStart"id="AddDiscountTimeStart" required>
                      </div>
                      <div class = "form-group">
                      <label> Discount Validity time end: </label>
                      <input type="time" name = "txtTimeEnd" id="AddDiscountTimeEnd" required>
                      </div>
                      <div class = "form-group">
                      <label> Discount Amount:</label>
                      <input type="number" min="0" name = "txtEmailAddress" step="0.01" id="AddDiscountAmount" required>
                      </div>
                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitAdd">Add Discount</button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


        		<!-- This is the Modal that will be called for edit column -->
              <div class = "modal fade" id = "modalEdit" role = "dialog">
                <div class = "modal-dialog">

                  <div class="modal-content">
                    <div class = "modal-header">
                      <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                            <h4 class ="modal-title">Discount</h4>
                          </div>
                          <div class="modal-body">
                            <form style="text-align:center">
                              <div class = "form-group">
                                <label> Discount ID: </label>
                                <input type="text" name ="txtDiscountName" id="EditDiscountID" disabled>
                              </div>
                              <div class = "form-group">
                                <label> Discount Name: </label>
                                <input type="text" name ="txtDiscountName" id="EditDiscountName" required>
                              </div>
                              <div class="form-group">
                                <div>
                                <label> Discount Requirements: </label>
                              </div>
                                <textarea rows="4" cols="50" name="txtDiscountRequirements" id="EditDiscountRequirements"></textarea>
                              </div>
                              <div class = "form-group">
                                <label> Discount Validity date start: </label>
                                <input type="date" name = "txtDiscountDateStart" id="EditDiscountDateStart" required>
                              </div>
        					            <div class = "form-group">
                                <label> Discount Validity date end: </label>
                                <input type="date" name = "txtDiscountDateEnd" id="EditDiscountDateEnd" required>
                              </div>
        					            <div class = "form-group">
                                <label> Discount Validity time start: </label>
                                <input type="time" name = "txtTimeStart"id="EditDiscountTimeStart" required>
                              </div>
                              <div class = "form-group">
                              <label> Discount Validity time end: </label>
                              <input type="time" name = "txtTimeEnd" id="EditDiscountTimeEnd" required>
                              </div>
                              <div class = "form-group">
                              <label> Discount Amount:</label>
                              <input type="number" min="0" name = "txtEmailAddress" step="0.01" id="EditDiscountAmount" required>
                              </div>
                          </form>
                          </div>
                          <div class = "modal-footer">
                            <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitEdit">Edit Discount</button>
                            <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                          </div>
                        </div>
                  </div>
                </div>

                <!-- This is the Modal that will be called for delete column -->
                  <div class = "modal fade" id = "modalDelete" role = "dialog">
                    <div class = "modal-dialog">

                      <div class="modal-content">
                        <div class = "modal-header">
                          <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                                <h4 class ="modal-title">Discount</h4>
                              </div>
                              <div class="modal-body">
                                <form style="text-align:center">
                                  <div class = "form-group">
                                    <label> Discount ID: </label>
                                    <input type="text" name ="txtDiscountName" id="DeleteDiscountID" disabled>
                                  </div>
                                  <div class = "form-group">
                                    <label> Discount Name: </label>
                                    <input type="text" name ="txtDiscountName" id="DeleteDiscountName" disabled>
                                  </div>
                                  <div class="form-group">
                                    <div>
                                    <label> Discount Requirements: </label>
                                  </div>
                                    <textarea rows="4" cols="50" name="txtDiscountRequirements" id="DeleteDiscountRequirements" disabled></textarea>
                                  </div>
                                  <div class = "form-group">
                                    <label> Discount Validity date start: </label>
                                    <input type="date" name = "txtDiscountDateStart" id="DeleteDiscountDateStart" disabled>
                                  </div>
                                  <div class = "form-group">
                                    <label> Discount Validity date end: </label>
                                    <input type="date" name = "txtDiscountDateEnd" id="DeleteDiscountDateEnd" disabled>
                                  </div>
                                  <div class = "form-group">
                                    <label> Discount Validity time start: </label>
                                    <input type="time" name = "txtTimeStart" id="DeleteDiscountTimeStart" disabled>
                                  </div>
                                  <div class = "form-group">
                                  <label> Discount Validity time end: </label>
                                  <input type="time" name = "txtTimeEnd" id="DeleteDiscountTimeEnd" disabled>
                                  </div>
                                  <div class = "form-group">
                                  <label> Discount Amount:</label>
                                  <input type="number" min="0" name = "txtEmailAddress" step="0.01" id="DeleteDiscountAmount" disabled>
                                  </div>
                              </form>
                              </div>
                              <div class = "modal-footer">
                                <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitDelete">Delete Discount</button>
                                <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                              </div>
                            </div>
                      </div>
                    </div>

    <script type="text/javascript">
      $(document).ready(function(){

        $('.modal-footer').on('click','#SubmitAdd',function(){
          $.ajax({
            type: 'POST',
            url: '/admin/discounts',
            data:{
              '_token': $('input[name=_token]').val(),
              'name':$('#AddDiscountName').val(),
              'requirement':$('#AddDiscountRequirements').val(),
              'datestart':$('#AddDiscountDateStart').val(),
              'dateend':$('#AddDiscountDateEnd').val(),
              'timestart':$('#AddDiscountTimeStart').val(),
              'timeend':$('#AddDiscountTimeEnd').val(),
              'amount':$('#AddDiscountAmount').val()
            },
            success: function(response){
              if(response.errors){
                toastr.error('Validation Error','Error Alert', {timeOut:5000});
              }
              else{
              toastr.success('Successfully Added Discount','Success Alert',{timeOut:5000});
              $('#DiscountTable').prepend("<tr id='Discount" + response.PK_DiscountID + "'><td>" + response.PK_DiscountID + "</td><td>" +response.Discount_Name + "</td><td>" + response.Discount_Requirements + "</td><td>" + response.Discount_ValidDateStart + "</td><td>" + response.Discount_ValidDateEnd + "</td><td>" + response.Discount_ValidTimeStart + "<td><td>" + response.Discount_ValidTimeEnd + "</td><td>" + response.Discount_Amount + "</td><td><button id = 'btnDelete' style = 'background-color:red;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement= '" + response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Delete</button><button id = 'btnEdit' style = 'background-color:green;margin-right:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement='" +response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Edit</button></td></tr>");
              }
            }
          });
        });

        $(document).on('click','#btnEdit',function(){
          id = $(this).data('id');
          $('#EditDiscountID').val($(this).data('id'));
          $('#EditDiscountName').val($(this).data('name'));
          $('#EditDiscountRequirements').val($(this).data('requirement'));
          $('#EditDiscountDateStart').val($(this).data('datestart'));
          $('#EditDiscountDateEnd').val($(this).data('dateend'));
          $('#EditDiscountTimeStart').val($(this).data('timestart'));
          $('#EditDiscountTimeEnd').val($(this).data('timeend'));
          $('#EditDiscountAmount').val($(this).data('amount'));
          $('#modalEdit').modal('show');
        });

        $('.modal-footer').on('click','#SubmitEdit',function(){
          $.ajax({
            type: 'PUT',
            url: '/admin/discounts/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'name':$('#EditDiscountName').val(),
              'requirement':$('#EditDiscountRequirements').val(),
              'datestart':$('#EditDiscountDateStart').val(),
              'dateend':$('#EditDiscountDateEnd').val(),
              'timestart':$('#EditDiscountTimeStart').val(),
              'timeend':$('#EditDiscountTimeEnd').val(),
              'amount':$('#EditDiscountAmount').val()
            },
            success: function(response){
              if(response.errors){
                toastr.error("Validation Error", "Error Alert", {timeOut:5000});
              }
              else{
              toastr.success('Successfully Updated discount','Success Alert', {timeOut:5000});
              $('#Discount'+response.PK_DiscountID).replaceWith("<tr id='Discount" + response.PK_DiscountID + "'><td>" + response.PK_DiscountID + "</td><td>" +response.Discount_Name + "</td><td>" + response.Discount_Requirements + "</td><td>" + response.Discount_ValidDateStart + "</td><td>" + response.Discount_ValidDateEnd + "</td><td>" + response.Discount_ValidTimeStart + "<td><td>" + response.Discount_ValidTimeEnd + "</td><td>" + response.Discount_Amount + "</td><td><button id = 'btnDelete' style = 'background-color:red;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement= '" + response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Delete</button><button id = 'btnEdit' style = 'background-color:green;margin-right:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_DiscountID + "' data-name = '" + response.Discount_Name + "' data-requirement='" +response.Discount_Requirements + "' data-datestart ='" + response.Discount_ValidDateStart + "' data-dateend = '" + response.Discount_ValidDateEnd + "' data-timestart='" + response.Discount_ValidTimeStart + "' data-timeend = '" + response.Discount_ValidTimeEnd + "' data-amount = '" + response.Discount_Amount + "'>Edit</button></td></tr>");
            }
            }
          });
        });

        $(document).on('click','#btnDelete',function(){
          id = $(this).data('id');
          $('#DeleteDiscountID').val($(this).data('id'));
          $('#DeleteDiscountName').val($(this).data('name'));
          $('#DeleteDiscountRequirements').val($(this).data('requirement'));
          $('#DeleteDiscountDateStart').val($(this).data('datestart'));
          $('#DeleteDiscountDateEnd').val($(this).data('dateend'));
          $('#DeleteDiscountTimeStart').val($(this).data('timestart'));
          $('#DeleteDiscountTimeEnd').val($(this).data('timeend'));
          $('#DeleteDiscountAmount').val($(this).data('amount'));
          $('#modalDelete').modal('show');
        });


        $('.modal-footer').on('click','#SubmitDelete',function()
        {
          $.ajax({
            type:'DELETE',
            url: '/admin/discounts/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
            },
          success: function(response){
            toastr.warning('Successfully Deleted Discount','Delete Alert',{timeOut:5000});
              $('#Discount' + response.PK_DiscountID).remove();
          }
          });
        });


      });
    </script>


@endsection
