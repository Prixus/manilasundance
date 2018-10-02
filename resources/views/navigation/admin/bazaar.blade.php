@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<!-- Start Dessa 2018-0829 -->

          <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> August</h3>
              <p>Month</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
          </div>
        </div>

          <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>253</h3>
              <p>Forecasted Number of Bazaar Attendees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
          <br>
        </div>

<!-- End Dessa 2018-0829 -->

          <h2 class="sub-header">Bazaars<!-- <div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					 --></h2>

          <div class="table-responsive">

		  <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" id="BtnAdd">Add Bazaar</button></h2>

            <table class="table table-striped" id="BazaarTable">
              <thead>
                <tr>
					<th>Bazaar ID</th>
					<th>Bazaar Name</th>
					<th>Starting Date</th>
          <th>Starting Time</th>
					<th>Ending Date</th>
          <th>Ending Time</th>
					<th>Bazaar Venue</th>
          <th>Bazaar Status</th>

          <th></th>
                </tr>
                {{csrf_field()}}
              </thead>
              <tbody>
                @foreach($bazaars as $bazaar)
                <tr id = "bazaar{{$bazaar->PK_BazaarID}}">
        					<td>{{$bazaar->PK_BazaarID}}</td>
        					<td>{{$bazaar->Bazaar_Name}}</td>
        					<td>{{$bazaar->Bazaar_DateStart}}</td>
                  <td>{{$bazaar->Bazaar_TimeStart}}</td>
                  <td>{{$bazaar->Bazaar_DateEnd}}</td>
        					<td>{{$bazaar->Bazaar_TimeEnd}}</td>
        					<td>{{$bazaar->Bazaar_Venue}}</td>
                  <td>{{$bazaar->Bazaar_Status}}</td>
        					<td><button id="BtnEdit"    style = "background-color:green;float:left;"  class="btn btn-primary"  aria-pressed="false" data-description="{{$bazaar->Bazaar_Description}}" data-id="{{$bazaar->PK_BazaarID}}" data-name="{{$bazaar->Bazaar_Name}}" data-startdate="{{$bazaar->Bazaar_DateStart}}" data-enddate = "{{$bazaar->Bazaar_DateEnd}}" data-starttime="{{$bazaar->Bazaar_TimeStart}}" data-endtime= "{{$bazaar->Bazaar_TimeEnd}}"  data-venue="{{$bazaar->Bazaar_Venue}}" data-status="{{$bazaar->Bazaar_Status}}" >Edit</button></td>
                  <td><button id="BtnDelete" style = "background-color:red;float:right;"   class="btn btn-primary" aria-pressed="false" data-description="{{$bazaar->Bazaar_Description}}" data-id="{{$bazaar->PK_BazaarID}}" data-name="{{$bazaar->Bazaar_Name}}" data-startdate="{{$bazaar->Bazaar_DateStart}}" data-enddate = "{{$bazaar->Bazaar_DateEnd}}" data-starttime="{{$bazaar->Bazaar_TimeStart}}" data-endtime= "{{$bazaar->Bazaar_TimeEnd}}" data-venue="{{$bazaar->Bazaar_Venue}}" data-status="{{$bazaar->Bazaar_Status}}">Cancel Bazaar</button></td>
                  <td><button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary"><a href = "/admin/manage_stalls/{{$bazaar->PK_BazaarID}}" >Monitor Stalls</a></button></td>
                </tr>
                @endforeach

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
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">BAZAAR REGISTRATION</h4>
                  </div>
                  <div class="modal-body">
                      {!! Form::open(array('url' => '/admin/bazaar','files'=>'true')) !!}
                      <div class = "form-group">
                        <label> BAZAAR NAME: </label>
                        {{Form::text('Bazaar_Name',null,array('placeholder'=>'Enter Bazaar Name','required'=>'required'))}}
                      </div>
                      <div class = "form-group">
                        <label> BAZAAR STARTING DATE: </label>
                        {{Form::date('Bazaar_DateStart')}}
                      </div>
                      <div class="form-group">
                        <label> BAZAAR ENDING DATE: </label>
                        {{Form::date('Bazaar_DateEnd')}}
                      </div>
                      <div class = "form-group">
                        <label> BAZAAR STARTING TIME: </label>
                        {{Form::time('Bazaar_TimeStart')}}
                      </div>
                      <div class="form-group">
                        <label> BAZAAR ENDING TIME: </label>
                        {{Form::time('Bazaar_TimeEnd')}}
                      </div>

                      <div class = "form-group">
                        <label> BAZAAR VENUE: </label>
                        {{Form::select('Bazaar_Venue',array('WorldTradeCenter' => 'World Trade Center','MegatradeHall'=> 'Mega Trade Hall'),null)}}
                      </div>
                      <div class = "form-group">
                        <label> BAZAAR EVENT DESCRIPTION: </label>
                        <textarea name="Bazaar_Description" required></textarea>
                      </div>
                      <div class = "form-group">
                        <label> BAZAAR EVENT POSTER: </label>
                        {{Form::file('Bazaar_EventPoster')}}
                      </div>
                      <div class = "form-group">
                        {{Form::submit('SubmitAdd')}}
                      </div>
              {!! Form::close() !!}
                  </div>

                  <div class = "modal-footer">
                    <button type = "button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                  </div>
              </div>
          </div>
        </div>

				<!-- This is the Modal that will be called for edit column -->
      <div class = "modal fade" id = "ModalEdit" role = "dialog">
        <div class = "modal-dialog">
          <div class="modal-content">
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">UPDATE BAZAAR</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class = "form-group">
                        <label> BAZAAR ID: </label>
                        <input type="text" class="form-control" id="EditID" disabled>
                      </div>

                      <div class = "form-group">
                        <label> BAZAAR NAME: </label>
                        <input type="text" class="form-control" id="EditName" required>
                      </div>
                      <div class = "form-group">
                        <label> BAZAAR STARTING DATE: </label>
                        <input type="date" class="form-control" id="EditStartDate" required>
                      </div>
                      <div class="form-group">
                        <label> BAZAAR ENDING DATE: </label>
                        <input type= "date" class="form-control" id="EditEndDate" required>
                      </div>
                      <div class = "form-group">
                        <label> BAZAAR STARTING TIME: </label>
                        <input type="time" class="form-control" id="EditStartTime" required>
                      </div>
                      <div class="form-group">
                        <label> BAZAAR ENDING TIME: </label>
                        <input type= "time" class="form-control" id="EditEndTime" required>
                      </div>
                      <div class = "form-group">
                      <label> BAZAAR VENUE: </label>
                        <select id= "EditVenue" disabled class="form-control">
                          <option value="WorldTradeCenter">World Trade Center</option>
                          <option value="MegatradeHall">Mega Trade Hall</option>
                        </select>

                      </div>
                      <div class = "form-group">
                        <label> BAZAAR STATUS: </label>
                        <select id= "EditStatus" class="form-control">
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                      </div>
                      <div class = "form-group">
                        <div class = "form-group">
                          <label> BAZAAR EVENT DESCRIPTION: </label>
                          <textarea name="Bazaar_Description" class="form-control" id ="EditDescription" required></textarea>
                        </div>
                      </div>

                  </form>
                </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitEdit"> EDIT </button>
                    <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                  </div>
          </div>
        </div>
        </div>

        <!-- This is the Modal that will be called for cancel column -->
      <div class = "modal fade" id = "ModalCancel" role = "dialog">
        <div class = "modal-dialog">
          <div class="modal-content">
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">CANCEL BAZAAR </h4>
              </div>
                  <div class="modal-body">
                    <form>
                        <div class = "form-group">
                          <label> BAZAAR ID: </label>
                          <input type="text" class="form-control" id="DeleteID" disabled>
                        </div>

                        <div class = "form-group">
                          <label> BAZAAR NAME: </label>
                          <input type="text" class="form-control" id="DeleteName" disabled>
                        </div>
                        <div class = "form-group">
                          <label> BAZAAR STARTING DATE: </label>
                          <input type="date" class="form-control" id="DeleteStartDate" disabled>
                        </div>
                        <div class="form-group">
                          <label> BAZAAR ENDING DATE: </label>
                          <input type= "date" class="form-control" id="DeleteEndDate" disabled>
                        </div>
                        <div class = "form-group">
                          <label> BAZAAR STARTING TIME: </label>
                          <input type="time" class="form-control" id="DeleteStartTime" disabled>
                        </div>
                        <div class="form-group">
                          <label> BAZAAR ENDING TIME: </label>
                          <input type= "time" class="form-control" id="DeleteEndTime" disabled>
                        </div>
                        <div class = "form-group">
                        <label> BAZAAR VENUE: </label>
                          <select id= "DeleteVenue" disabled class="form-control">
                            <option value="WorldTradeCenter">World Trade Center</option>
                            <option value="MegatradeHall">Mega Trade Hall</option>
                          </select>

                        </div>
                        <div class = "form-group">
                          <label> BAZAAR STATUS: </label>
                          <select id= "DeleteStatus" disabled class="form-control">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                          </select>
                        </div>
                        <div class = "form-group">
                          <div class = "form-group" disabled>
                            <label> BAZAAR EVENT DESCRIPTION: </label>
                            <textarea name="Bazaar_Description" class="form-control" id ="DeleteDescription" disabled></textarea>
                          </div>
                        </div>

                  </form>
                    </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitEdit">CANCEL </button>
                    <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


        <script type= "text/javascript">

    $(document).ready(function(){
        $(document).on('click','#BtnAdd',function(){
          $('#ModalAdd').modal('show');
        });
        $(document).on('click','#BtnEdit', function(){
          id = $(this).data('id');
          $('#EditID').val($(this).data('id'));
          $('#EditName').val($(this).data('name'));
          $('#EditEndTime').val($(this).data('endtime'));
          $('#EditStartTime').val($(this).data('starttime'));
          $('#EditEndDate').val($(this).data('enddate'));
          $('#EditStartDate').val($(this).data('startdate'));
          $('#EditVenue').val($(this).data('venue'));
          $('#EditStatus').val($(this).data('status'));
          $('#EditDescription').val($(this).data('description'));
          $('#EditBookingCost').val($(this).data('bookingcost'));
          $('#ModalEdit').modal('show');
        });

        $('.modal-footer').on('click','#SubmitEdit',function(){
          $.ajax({
            type: "PUT",
            url: '/admin/bazaar/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'BazaarName': $('#EditName').val(),
              'BazaarStartDate': $('#EditStartDate').val(),
              'BazaarEndDate': $('#EditEndDate').val(),
              'BazaarStartTime': $('#EditStartTime').val(),
              'BazaarEndTime': $('#EditEndTime').val(),
              'BazaarVenue': $('#EditVenue').val(),
              'BazaarBookingCost': $('#EditBookingCost').val(),
              'BazaarStatus': $('#EditStatus').val(),
              'BazaarDescription': $('#EditDescription').val()
            },
            success: function(response){
              if(response.errors){
                toastr.error("Validation Error","Error Alert", {timeOut:5000});
              }
              else{
                toastr.success('Successfully Edited Bazaar','Success Alert', {timeOut: 5000});
                $('#bazaar'+ response.PK_BazaarID).replaceWith("<tr id = 'bazaar"+response.PK_BazaarID + "'><td>" + response.PK_BazaarID + "</td><td>" + response.Bazaar_Name + "</td><td>" + response.Bazaar_DateStart + "</td><td>" + response.Bazaar_DateEnd + "</td><td>" + response.Bazaar_TimeStart + "</td><td>" + response.Bazaar_TimeEnd + "</td><td>" +  response.Bazaar_Venue + "</td><td>" + response.Bazaar_Status + "</td><td> <button id='BtnEdit'  style = 'background-color:green;float:left;'  class='btn btn-primary'  aria-pressed='false' data-description='" + response.Bazaar_Description + "' data-id=' " + response.PK_BazaarID + "' data-name='" + response.Bazaar_Name + "' data-starttime='" + response.Bazaar_TimeStart + "' data-endtime='" + response.Bazaar_TimeEnd + "' data-startdate = '" + response.Bazaar_DateStart + "'data-enddate = '" + response.Bazaar_DateEnd + "' data-venue= '" + response.Bazaar_Venue + "' data-status='" + response.Bazaar_Status + "'>Edit</button></td><td><button id='BtnDelete' style = 'background-color:red;float:right;'   class='btn btn-primary' aria-pressed='false' data-id= '" + response.PK_BazaarID + "' data-name='" + response.Bazaar_Name + "' data-starttime='" + response.Bazaar_TimeStart + "' data-endtime='" + response.Bazaar_TimeEnd + "' data-startdate = '" + response.Bazaar_DateStart + "data-enddate = '" + response.Bazaar_DateEnd + "' data-venue='" + response.Bazaar_Venue + "' data-status='" + response.Bazaar_Status + "'>Cancel Bazaar</button></td><td><button style = 'background-color:#337ab7;float:right;' type='button' class='btn btn-primary' aria-pressed='false'><a href = '/admin/manage_stalls/" + response.PK_BazaarID + "' >Manage Stalls</a></button></td></tr>");

              }

            }
          });
        });

        $(document).on('click', '#BtnDelete', function(){
          id = $(this).data('id');
          $('#DeleteID').val($(this).data('id'));
          $('#DeleteName').val($(this).data('name'));
          $('#DeleteEndTime').val($(this).data('endtime'));
          $('#DeleteStartTime').val($(this).data('starttime'));
          $('#DeleteEndDate').val($(this).data('enddate'));
          $('#DeleteStartDate').val($(this).data('startdate'));
          $('#DeleteVenue').val($(this).data('venue'));
          $('#DeleteStatus').val($(this).data('status'));
          $('#DeleteDescription').val($(this).data('description'));
          $('#DeleteBookingCost').val($(this).data('bookingcost'));
          $('#ModalCancel').modal('show');
        });

        $('.modal-footer').on('click','#SubmitDelete',function(){
          $.ajax({
            type:'PUT',
            url: '/admin/bazaar/cancel/' + id,
            data: {
              '_token': $('input[name=_token]').val(),
              'BazaarName': $('#DeleteName').val(),
              'BazaarStartDate': $('#DeleteStartDate').val(),
              'BazaarEndDate': $('#DeleteEndDate').val(),
              'BazaarStartTime': $('#DeleteStartTime').val(),
              'BazaarEndTime': $('#DeleteEndTime').val(),
              'BazaarVenue': $('#DeleteVenue').val(),
              'BazaarBookingCost': $('#DeleteBookingCost').val(),
              'BazaarStatus': $('#DeleteStatus').val(),
              'PurposeOfDelete': $('#DeletePurpose').val()
            },
          success: function(response){
            toastr.error('Successfully Cancelled Bazaar','Success Alert', {timeOut: 5000});
              $('#bazaar' + response.PK_BazaarID).remove();

          }
          });
        });
    });
        </script>


        @if($SucessAlert=='Bazaar Created')
            <script type= "text/javascript">
                    toastr.success('Bazaar has been created','Success Alert', {timeOut: 5000});
            </script>
        @endif
@endsection
