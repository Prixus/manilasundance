@extends('layouts.app')

@section('content')


<div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



          <h2 class="sub-header">Products
             <button style = "background-color:#337ab7;" type="button" class="btn btn-primary" id="BtnAdd">Add Product</button>
         </h2>
        <!-- <div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button> -->
          <!--
          <label>Sort By:</label>
              <select>
                <option>Product Name</option>
                <option>Date Added</option>
              </select>

          <button class = "btnSearch">GO</button>
                    -->
        <!-- </div> -->


          <div id = "searchRecord" class="table-responsive">

            <table class="table table-striped" id ="ProductTable">
              <thead>
                <tr >
          <th>Product ID</th>
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
                  <td>{{$product->PK_ProductID}}</td>
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
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> PRODUCT REGISTRATION </h4>
                  </div>
                  <div class="modal-body">
                      <form>
                      <div class = "form-group">
                        <label> PRODUCT NAME: </label>
                        <input type="text" placeholder="Enter Product Name" name ="txtProductName" class="form-control" id="AddProductName" required>
                      </div>

                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type ="button" class= "btn btn-success" data-dismiss="modal" id="SubmitAdd">ADD </button>
                    <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


    <!-- This is the Modal that will be called for edit column -->
      <div id = "modalEdit" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header" style = "background-color:#ffffa8">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> PRODUCT REGISTRATION </h4>
                  </div>
                  <div class="modal-body">
                    <form>

                      <div class = "form-group">
                        <label> PRODUCT ID: </label>
                        <input type="number" placeholder="KPOP Shirt" class="form-control" id="EditID" name ="txtProductID" disabled>
                      </div>
                      <div class = "form-group">
                        <label> PRODUCT NAME: </label>
                        <input type="text" placeholder="KPOP Shirt" class="form-control" id="EditName" name ="txtProductName" required>
                      </div>

                  </form>
                  </div>
                  <div class = "modal-footer">
                    <button type="button" class = "btn btn-success" data-dismiss = "modal" id="SubmitEdit">EDIT </button>
                    <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>


        <!-- This is the Modal that will be called for delete column -->
          <div id = "modalDelete" class = "modal fade"  role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header" style = "background-color:#ffffa8">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title"> DELETE PRODUCT </h4>
                      </div>
                      <div class="modal-body">
                        <form>

                          <div class = "form-group">
                            <label> PRODUCT ID: </label>
                            <input type="number" placeholder="Product ID" class="form-control" id="DeleteID" name ="txtProductID" disabled>
                          </div>
                          <div class = "form-group">
                            <label> PRODUCT NAME: </label>
                            <input type="text" placeholder="KPOP Shirt" class="form-control" id="DeleteName" name ="txtProductName" disabled>
                          </div>

                      </form>
                      </div>
                      <div class = "modal-footer">
                        <button type="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitDelete">DELETE </button>
                        <button type ="button" class = "btn btn-primary" data-dismiss = "modal"> CLOSE </button>
                      </div>
                    </div>
              </div>
            </div>


<script type= "text/javascript">


      $(document).ready(function()
      {

// start searchbar dessa 2018-0915

        var table = $('#ProductTable').DataTable({
        "order": [[ 0, "desc" ]]
    });

// end searchbar dessa 2018-0915

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

                                // start searchbar dessa 2018-0915-D

                                // table.row($('#product' + data.PK_ProductID)).invalidate();
                                // alert(table.row($('#product' + data.PK_ProductID)));

                                 // table.row($('#product' + data.PK_ProductID)).replaceWith('<tr id="product' + data.PK_ProductID + '"><td>' + data.Product_Name + '</td><td> ' + data.created_at + '</td><td style = "float:right;"><button id = "EditButton"  style = "background-color:green;float:left;"  class="btn btn-primary"  data-id = "' + data.PK_ProductID + '"  data-name = "' + data.Product_Name + '">Edit</button></td><td><button style = "background-color:red;float:right;" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="DeleteButton" data-id = "' + data.PK_ProductID + '"  data-name = "' + data.Product_Name + '">Delete</button></td></tr>').draw(false);

                                 // table.draw(false);

                                // table.ajax.reload();

                                table.row($('#product' + data.PK_ProductID)).remove();
                                table.row.add($(
                                      '<tr id="product' + data.PK_ProductID + '">' +
                                      '<td>'+ data.PK_ProductID + '</td>' +
                                      '<td>'+ data.Product_Name + '</td>' +
                                      '<td>' + data.created_at + '</td>' +
                                      '<td><button id = "EditButton" style = "background-color:green;float:right;"  class="btn btn-primary" data-id = "' + data.PK_ProductID + '"  data-name = "' + data.Product_Name + '">Edit</button></td>' +
                                      '<td><button style = "background-color:red;float:right;" type="button" class="btn btn-primary"  data-toggle="button" aria-pressed="false" id="DeleteButton" data-id = "' + data.PK_ProductID + '"  data-name = "' + data.Product_Name + '">Delete</button></td>' +
                                      '</tr>'
                                )).draw(false);

                                // end searchbar dessa 2018-0915-D

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
                                // $('#ProductTable').prepend("<tr id='product" + data.PK_ProductID + "'><td>" + data.Product_Name + "</td><td> " + data.created_at + "</td><td style = 'float:right;'><button id = 'EditButton'  style = 'background-color:green;float:left;'  class='btn btn-primary'  data-id = '" + data.PK_ProductID + "'  data-name = '" + data.Product_Name + "'>Edit</button></td><td><button style = 'background-color:red;float:right;' type='button' class='btn btn-primary' data-toggle='button' aria-pressed='false' id='DeleteButton' data-id = '" + data.PK_ProductID + "'  data-name = '" + data.Product_Name + "'>Delete</button></td></tr>");

                                // start searchbar dessa 2018-0915-A

                                  table.row.add($(
                                      '<tr id="product' + data.PK_ProductID + '">' +
                                      '<td>'+ data.PK_ProductID + '</td>' +
                                      '<td>'+ data.Product_Name + '</td>' +
                                      '<td>' + data.created_at + '</td>' +
                                      '<td><button id = "EditButton" style = "background-color:green;float:right;"  class="btn btn-primary" data-id = "' + data.PK_ProductID + '"  data-name = "' + data.Product_Name + '">Edit</button></td>' +
                                      '<td><button style = "background-color:red;float:right;" type="button" class="btn btn-primary"  data-toggle="button" aria-pressed="false" id="DeleteButton" data-id = "' + data.PK_ProductID + '"  data-name = "' + data.Product_Name + '">Delete</button></td>' +
                                      '</tr>'
                                  )).draw(false);

                                  // location.reload();

                              //       $('#ProductTable').DataTable()
                              //       .rows()
                              //       .invalidate()
                              //       .draw(false);

                              // table.clear().destroy();
                              // var table = $('#ProductTable').DataTable();
                              // table.draw();


                              // end searchbar dessa 2018-0915-A

                              }
                            }
                          });
            });

            $(document).on('click', '#DeleteButton', function(){
              $('#DeleteID').val($(this).data('id'));
              $('#DeleteName').val($(this).data('name'));
              id =($(this).data('id'));
              $('#modalDelete').modal('show');


            // start searchbar dessa 2018-0915-B

              // var btnDelete = $(this);
              // var selectedRow = btnDelete.parents("tr");
              //     selectedRow.remove();

            // end searchbar dessa 2018-0915-B

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
                toastr.error("Successfully Deleted Product", "Success Alert", {timeOut:5000});

                  // $('#product' + data.PK_ProductID).remove();


            // start searchbar dessa 2018-0915-C

                   // table.row($('#product' + data.PK_ProductID)).remove().draw();

                  // var rows = table
                  //           .rows('#product' + data.PK_ProductID )
                  //           .remove()
                  //           .draw();

                  //   // location.reload();

                              // table.clear();
                              // table = $('#ProductTable').DataTable();
                              // table.draw();

                  // var table = $('#ProductTable').DataTable();

                  //     alert(id);
                  // selectedRow.remove();
                  // table.draw();
                  // var table = $('#ProductTable').DataTable();

                      // table.deleteRow(table.id);
                      // table.draw();
                      // table.clear().draw();

                      table.row($('#product' + data.PK_ProductID)).remove().draw(false);

            // end searchbar dessa 2018-0915-C


              }
              });
            });
      });
</script>

@endsection
