@extends('layouts.app')

@section('content')


<div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



          <h2 class="sub-header">Products
				<div style = "float:right;font-size:14px;">
					<input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
					<!--
					<label>Sort By:</label>
							<select>
								<option>Product Name</option>
								<option>Date Added</option>
							</select>

					<button class = "btnSearch">GO</button>
                    -->
				</div>
			</h2>


          <div id = "searchRecord" class="table-responsive">



		  <button style = "background-color:#337ab7;" type="button" class="btn btn-primary" id="BtnAdd">Add Product</button>
            <table class="table table-striped" id ="ProductTable">
              <thead>
                <tr >
					<th>Product Name</th>
					<th>Date Added</th>
          <th></th>
          <th></th>
                </tr>
                  {{ csrf_field() }}
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr id="product{{$product->PK_ProductID}}">
        					<td>{{$product->Product_Name}}</td>
        					<td>{{$product->created_at}}</td>
        					<td style = "float:right;"><button id = "EditButton"  style = "background-color:green;float:left;"  class="btn btn-primary"  data-id = "{{$product->PK_ProductID}}"  data-name = "{{$product->Product_Name}}">Edit</button></td>
                  <td>                       <button id = "DeleteButton" style = "background-color:red;float:right;"  class="btn btn-primary"  data-id = "{{$product->PK_ProductID}}"  data-name = "{{$product->Product_Name}}">Delete</button></td>
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
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Product Registration </h4>
                  </div>
                  <div class="modal-body">
                      <form  style="text-align:center">
                      <div class = "form-group">
                        <label> Product Name: </label>
                        <input type="text" placeholder="Enter Product Name" name ="txtProductName"  id="AddProductName" required>
                      </div>

                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type ="button" class= "btn btn-success" data-dismiss="modal" id="SubmitAdd">ADD </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


		<!-- This is the Modal that will be called for edit column -->
      <div id = "modalEdit" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Product Registration </h4>
                  </div>
                  <div class="modal-body">
                    <form style="text-align:center">

                      <div class = "form-group">
                        <label> Product ID: </label>
                        <input type="number" placeholder="KPOP Shirt" id="EditID" name ="txtProductID" disabled>
                      </div>
                      <div class = "form-group">
                        <label> Product Name: </label>
                        <input type="text" placeholder="KPOP Shirt" id="EditName" name ="txtProductName" required>
                      </div>

                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitEdit">Edit </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


        <!-- This is the Modal that will be called for delete column -->
          <div id = "modalDelete" class = "modal fade"  role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title"> Delete Product </h4>
                      </div>
                      <div class="modal-body">
                        <form style="text-align:center">

                          <div class = "form-group">
                            <label> Product ID: </label>
                            <input type="number" placeholder="Product ID" id="DeleteID" name ="txtProductID" disabled>
                          </div>
                          <div class = "form-group">
                            <label> Product Name: </label>
                            <input type="text" placeholder="KPOP Shirt" id="DeleteName" name ="txtProductName" disabled>
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-default" data-dismiss = "modal" id="SubmitDelete">Delete </button>
                        <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                      </div>
                    </div>
              </div>
            </div>


<script type= "text/javascript">


      $(document).ready(function()
      {
        var brandID = {{ Session::get('BrandID')}}
            $(document).on('click', '#EditButton', function(){
            $('#EditID').val($(this).data('id'));
            $('#EditName').val($(this).data('name'));
            id = $(this).data('id');
            $('#modalEdit').modal('show');
            });

            $('.modal-footer').on('click','#SubmitEdit',function() {
                          $.ajax({
                            type: 'PUT',
                            url: '/brand/products/' + id,
                            data: {
                              '_token': $('input[name=_token]').val(),
                              'id': $('#EditID').val(),
                              'name': $('#EditName').val()
                            },
                            success: function(data){
                              if(data.errors){
                                toastr.error('Validation Error', 'Error Alert', {timeOut:5000});
                              }
                              else{
                              toastr.success('Successfully updated Post!','Success Alert', {timeOut: 5000});
                                $('#product' + data.PK_ProductID).replaceWith("<tr id='product" + data.PK_ProductID + "'><td>" + data.Product_Name + "</td><td> " + data.created_at + "</td><td style = 'float:right;'><button id = 'EditButton'  style = 'background-color:green;float:left;'  class='btn btn-primary'  data-id = '" + data.PK_ProductID + "'  data-name = '" + data.Product_Name + "'>Edit</button></td><td><button style = 'background-color:red;float:right;' type='button' class='btn btn-primary' data-toggle='button' aria-pressed='false' id='DeleteButton' data-id = '" + data.PK_ProductID + "'  data-name = '" + data.Product_Name + "'>Delete</button></td></tr>");
                              }
                            }
                          });
            });

            $(document).on('click', '#BtnAdd', function(){
            $('#ModalAdd').modal('show');
            });

            $('.modal-footer').on('click','#SubmitAdd',function()
            {
                          $.ajax({
                            type: "POST",
                            url: '/brand/products',
                            data: {
                              '_token': $('input[name=_token]').val(),
                              'name': $('#AddProductName').val(),
                              'brandID': brandID
                            },

                            success: function(data){
                              if(data.errors){
                                toastr.error('Validation Error', 'Error Alert', {timeOut:5000});
                              }
                              else{
                              toastr.success('Successfully Added Product!','Success Alert', {timeOut: 5000});
                                $('#ProductTable').prepend("<tr id='product" + data.PK_ProductID + "'><td>" + data.Product_Name + "</td><td> " + data.created_at + "</td><td style = 'float:right;'><button id = 'EditButton'  style = 'background-color:green;float:left;'  class='btn btn-primary'  data-id = '" + data.PK_ProductID + "'  data-name = '" + data.Product_Name + "'>Edit</button></td><td><button style = 'background-color:red;float:right;' type='button' class='btn btn-primary' data-toggle='button' aria-pressed='false' id='DeleteButton' data-id = '" + data.PK_ProductID + "'  data-name = '" + data.Product_Name + "'>Delete</button></td></tr>");
                              }
                            }
                          });
            });

            $(document).on('click', '#DeleteButton', function(){
              $('#DeleteID').val($(this).data('id'));
              $('#DeleteName').val($(this).data('name'));
              id =($(this).data('id'));
              $('#modalDelete').modal('show');


            });

            $('.modal-footer').on('click','#SubmitDelete',function()
            {
              $.ajax({
                type:'DELETE',
                url: '/brand/products/' + id,
                data: {
                  '_token': $('input[name=_token]').val(),
                },
              success: function(data){
                  $('#product' + data.PK_ProductID).remove();
              }
              });
            });
      });
</script>

@endsection
