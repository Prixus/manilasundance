<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Manila Sundance</title>
<link rel="icon" href="/img/MSLogo.png">
<!-- This link calls the css file from the public folder -->
<link href="/css/sign.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/carousel.css" rel="stylesheet">




</head>
<body>

  <div class="container-fluid">
      <div class="row">

          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


            <h2 class="sub-header">Manila Sundance</h2>
        <h4>Fashion Events</h4>

        <br>
          <h5>Address:    <label>________________________</label></h5>
          <h5>Tin Number    <label>________________________</label></h5>
          <h5>Telephone Number    <label>________________________</label></h5>
          <h5>Fax:    <label>________________________</label></h5>
          <h5>Website:    <label>________________________</label></h5>
        <br>
        <div>
        <br>
        <br>
        <h5>Billing Party</h5>
          @foreach($ReservationAccountBrandInformations as $ReservationAccountBrandInformation)
          <h5>Tin Number:    <label>{{$ReservationAccountBrandInformation->GuestBrand_TinNumber}}</label></h5>
          <h5>Company:    <label>{{$ReservationAccountBrandInformation->GuestBrand_Name}}</label></h5>
          <h5>Name:    <label>{{$ReservationAccountBrandInformation->GuestBrand_OwnerName}}</label></h5>
          <h5>Tel:    <label>{{$ReservationAccountBrandInformation->GuestBrand_MobileNumber}}</label></h5>
          <h5>Website:    <label>{{$ReservationAccountBrandInformation->GuestBrand_Website}}</label></h5>
          @endforeach
        <br>
        </div>

          <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Stall ID</th>
                    <th>Stall Type</th>
                    <th>Stall Size</th>
                    <th>Stall Booking Cost</th>
                    <th>Stall Rental Cost</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ReservedStalls as $ReservedStall)
                  <tr>
                    <td>{{$ReservedStall->PK_StallID}}</td>
                    <td>{{$ReservedStall->Stall_Type}}</td>
                    <td>{{$ReservedStall->Stall_Size}}</td>
                    <td>{{$ReservedStall->Stall_BookingCost}}</td>
                    <td>{{$ReservedStall->Stall_RentalCost}}</td>
                  </tr>
                  @endforeach
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Cost:</td>
                    <td>{{$TotalCost}}</td>
                </tbody>
              </table>
            </div>
        <br><br>
        <label>Thank you for staying with us!</label>
        <br><br>
        <div>
        </div>
          </div>

      </div>
  </div>

</body>
</html>
