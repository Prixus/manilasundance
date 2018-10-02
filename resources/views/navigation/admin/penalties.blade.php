@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Penalties<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					</div>
					</h2>
              <button style = "background-color:#337ab7;" type="button" class="btn btn-primary" id="BtnAdd">Add Penalty</button>

          <div class="table-responsive">
            <table id="PenaltiesTable" class="table table-striped">
              <thead>
                <tr>
					<th>Penalty ID</th>
					<th>Penalty Name</th>
					<th>Description</th>
          <th>Cost</th>
                </tr>
                {{csrf_field()}}
              </thead>
              <tbody>
                @foreach($Penalties as $Penalty)
                <tr id='Penalty{{$Penalty->PK_PenaltyID}}'>
					              <td>{{$Penalty->PK_PenaltyID}}</td>
              				  <td>{{$Penalty->Penalty_Name}}</td>
					              <td>{{$Penalty->Penalty_Description}}</td>
                        <td>{{$Penalty->Penalty_Cost}}</td>
					          <td>
                        <button id="btnDelete" style = 'background-color:red;' type='button' class='btn btn-primary' data-toggle='button' aria-pressed='false' data-id='{{$Penalty->PK_PenaltyID}}' data-name='{{$Penalty->Penalty_Name}}' data-description='{{$Penalty->Penalty_Description}}' data-cost='{{$Penalty->Penalty_Cost}}'>Delete</button>
                        <button id="btnEdit" style = 'background-color:green;margin-right:5px;' type='button' class='btn btn-primary' data-id='{{$Penalty->PK_PenaltyID}}' data-name='{{$Penalty->Penalty_Name}}' data-description='{{$Penalty->Penalty_Description}}' data-cost='{{$Penalty->Penalty_Cost}}'>Edit</button>
                    </td>
                </tr>
                @endforeach

				</tbody>
            </table>
            {{$Penalties->links()}}
          </div>
        </div>
      </div>
    </div>


		<!-- This is the Modal that will be called for add column -->
      <div class = "modal fade" id = "modalAdd" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title">PENALTY</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label> PENALTY NAME: </label>
                        <input type= "text" class="form-control" name = "txtPenaltyName" id="AddPenaltyName" required>
                      </div>
                      <div class = "form-group">
                        <div>
                        <label> PENALTY DESCRIPTION: </label>
                        </div>
                        <textarea rows="4" cols="50" name="txtDescription" class="form-control" id="AddPenaltyDescription" required></textarea>
                      </div>
					            <div class = "form-group">
                        <label> PENALTY COST: </label>
                        <input type="number" min="0" step="0.01" name = "PenaltyCost" class="form-control" id="AddPenaltyCost" required>
                      </div>

                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type ="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitAdd"> ADD PENALTY </button>
                    <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>

        <!-- This is the Modal that will be called for edit column -->
          <div class = "modal fade" id = "modalEdit" role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header" style = "background-color:#ffffa8">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title">PENALTY</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label> PPENALTY ID: </label>
                            <input type= "text" name = "txtPenaltyName" class="form-control" id="EditPenaltyID" disabled>
                          </div>
                          <div class="form-group">
                            <label> PENALTY NAME: </label>
                            <input type= "text" name = "txtPenaltyName" class="form-control" id="EditPenaltyName" required>
                          </div>
                          <div class = "form-group">
                            <div>
                            <label> PENALTY DESCRIPTION: </label>
                            </div>
                            <textarea rows="4" cols="50" name="txtDescription" class="form-control" id="EditPenaltyDescription" required></textarea>
                          </div>
    					            <div class = "form-group">
                            <label> PENALTY COST: </label>
                            <input type="number" min="0" step="0.01" name = "PenaltyCost" class="form-control" id="EditPenaltyCost" required>
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type ="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitEdit"> EDIT </button>
                        <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                      </div>
                    </div>
              </div>
            </div>

            <!-- This is the Modal that will be called for delete column -->
              <div class = "modal fade" id = "modalDelete" role = "dialog">
                <div class = "modal-dialog">

                  <div class="modal-content">
                    <div class = "modal-header" style = "background-color:#ffffa8">
                      <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                            <h4 class ="modal-title">PENALTY</h4>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="form-group">
                                <label> PENALTY NAME: </label>
                                <input type= "text" name = "txtPenaltyName" class="form-control" id="DeletePenaltyName" required>
                              </div>
                              <div class = "form-group">
                                <div>
                                <label> PENALTY DESCRIPTION: </label>
                                </div>
                                <textarea rows="4" cols="50" name="txtDescription" class="form-control" id="DeletePenaltyDescription" required></textarea>
                              </div>
                              <div class = "form-group">
                                <label> PENALTY COST: </label>
                                <input type="number" min="0" step="0.01" name = "PenaltyCost" class="form-control" id="DeletePenaltyCost" required>
                              </div>

                          </form>
                          </div>
                          <div class = "modal-footer">
                            <button type ="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitDelete"> DELETE PENALTY </button>
                            <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                          </div>
                        </div>
                  </div>
                </div>

<script type="text/javascript">
  $(document).ready(function(){

      $(document).on('click', '#BtnAdd', function(){
            $('#modalAdd').modal('show');
      });

      $('.modal-footer').on('click','#SubmitAdd',function(){
        $.ajax({
          type: 'POST',
          url: '/admin/penalties',
          data:{
            '_token':$('input[name=_token]').val(),
            'name':$('#AddPenaltyName').val(),
            'description':$('#AddPenaltyDescription').val(),
            'cost':$('#AddPenaltyCost').val()
          },
          success: function(response){
            toastr.success('Successfully Added Penalty','Success Alert', {timeOut:5000});
            $('#PenaltiesTable').prepend("<tr id='Penalty" + response.PK_PenaltyID + "'><td> " + response.PK_PenaltyID + "</td><td>" + response.Penalty_Name + "</td><td>" + response.Penalty_Description + "</td><td>" + response.Penalty_Cost + "</td><td><button id='btnDelete' style = 'background-color:red;' type='button' class='btn btn-primary' data-toggle='button' aria-pressed='false' data-id='" + response.PK_PenaltyID + "' data-name='" + response.Penalty_Name + "' data-description='" + response.Penalty_Description + "' data-cost='" + response.Penalty_Cost + "'>Delete</button><button id='btnEdit' style = 'background-color:green;margin-right:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_PenaltyID + "' data-name='" + response.Penalty_Name + "' data-description='" + response.Penalty_Description + "' data-cost='" + response.Penalty_Cost + "'>Edit</button></td></tr>");
          }
        });
      });

        $(document).on('click','#btnEdit',function(){
          id= $(this).data('id');
          $('#EditPenaltyID').val($(this).data('id'));
          $('#EditPenaltyCost').val($(this).data('cost'));
          $('#EditPenaltyName').val($(this).data('name'));
          $('#EditPenaltyDescription').val($(this).data('description'));
          $('#modalEdit').modal('show');
        });

        $('.modal-footer').on('click','#SubmitEdit',function(){
          $.ajax({
            type: 'PUT',
            url: '/admin/penalties/'+id,
            data: {
              '_token':$('input[name=_token]').val(),
              'name':$('#EditPenaltyName').val(),
              'description':$('#EditPenaltyDescription').val(),
              'cost':$('#EditPenaltyCost').val()
            },
            success: function(response){
              toastr.success('Successfully Edited Penalty','Success Alert', {timeOut:5000});
              $('#Penalty' +response.PK_PenaltyID).replaceWith("<tr id='Penalty" + response.PK_PenaltyID + "'><td> " + response.PK_PenaltyID + "</td><td>" + response.Penalty_Name + "</td><td>" + response.Penalty_Description + "</td><td>" + response.Penalty_Cost + "</td><td><button id='btnDelete' style = 'background-color:red;' type='button' class='btn btn-primary' data-toggle='button' aria-pressed='false' data-id='" + response.PK_PenaltyID + "' data-name='" + response.Penalty_Name + "' data-description='" + response.Penalty_Description + "' data-cost='" + response.Penalty_Cost + "'>Delete</button><button id='btnEdit' style = 'background-color:green;margin-right:5px;' type='button' class='btn btn-primary' data-id='" + response.PK_PenaltyID + "' data-name='" + response.Penalty_Name + "' data-description='" + response.Penalty_Description + "' data-cost='" + response.Penalty_Cost + "'>Edit</button></td></tr>");

            }
          });
        });



      $(document).on('click','#btnDelete',function(){
        id= $(this).data('id');
        $('#DeletePenaltyID').val($(this).data('id'));
        $('#DeletePenaltyCost').val($(this).data('cost'));
        $('#DeletePenaltyName').val($(this).data('name'));
        $('#DeletePenaltyDescription').val($(this).data('description'));
        $('#modalDelete').modal('show');
      });

      $('.modal-footer').on('click','#SubmitDelete',function(){
                $.ajax({
                  type:'DELETE',
                  url: '/admin/penalties/' + id,
                  data: {
                    '_token': $('input[name=_token]').val(),
                  },
                success: function(response){
                  toastr.warning('Successfully Deleted Penalty','Delete Alert',{timeOut:5000});
                    $('#Penalty' + response.PK_PenaltyID).remove();
                }
                });
      });



  });
</script>
@endsection
