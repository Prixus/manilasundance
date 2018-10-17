@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2>Update Payment Details<h2>

            <br>
            <div style = 'font-size:18px;'>
                <label style = 'width: 280px;'> Official Receipt Number: </label>
                <input style = 'width: 280px;' type="text" placeholder="Enter Official Receipt Number" name ="txtReceipt" required>

                <br><br><br>

                <label style = 'width: 280px;'> Payment Amount: </label>
                <input style = 'width: 280px;' type= "number" placeholder="Enter Amount Paid" name = "txtPayment" required>

                <br><br><br>

                <label style = 'width: 280px;'> Payment Date: </label>
                <input style = 'width: 280px;' type= "date" name = "txtDate" required>

                <br><br><br>

                <label style = 'width: 280px;'> Bill ID: </label>
                <input style = 'width: 280px;' type= "text" placeholder="Enter BillID" name = "txtBillID" required>

                <br><br><br>

                <label style = 'width: 280px;'> Enter Official Receipt picture: </label>
                <br><br>
                <input style = 'margin-left:300px;width: 250px;' type= "file" name = "ImagePic" required>
            </div>
            <br><br>
            <div>
                <button style = "margin-right:15px;background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/brand/reservations">Back</a></button>
                <button style = "margin-right:5px;background-color:green;float:right;" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"><a href = "#" >Confirm</a></button>
            </div>

        </div>
    </div>
</div>
@endsection
