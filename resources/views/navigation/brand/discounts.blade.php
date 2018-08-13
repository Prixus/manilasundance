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

            <table class="table table-striped">
              <thead>
                <tr>
					<th>Discount ID</th>
					<th>Discount Name</th>
                    <th>Discount Amount</th>
					<th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
					<td>dct-1001</td>
					<td>Advanced Reservation</td>
					<td>5000</td>
					<td>Reserve stalls a year advanced.</td>
                </tr>

				</tbody>
            </table>


          </div>
          <button style = "margin-right:15px;background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a href = "/brand/reserve_stall">Back</a></button>
        </div>
      </div>
    </div>

@endsection
