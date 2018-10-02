@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<form method="POST">
      <h3 class="sub-header subsett">Stall Reservations Report
          <div style=float:right;font-size:14px;>
          <input type = "text" placeholder = "Search...">
          <button class = "btnSearch">GO</button>
          </div></h3>
      <h5>January 03, 2018 - February 23, 2018</h5>


<table class="table table-striped" style=font-size:14px;>
          <br><br>
              <thead>
                <tr>
          <th>Reservation ID</th>
          <th>Bazaar ID</th>
          <th>Stall ID</th>
          <th>Reservation Datetime</th>
          <th>Reservation Cost</th>
          <th>Reservation Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
                <tr>
          <td>rsv-001</td>
          <td>bzr-001</td>
          <td>stl-001</td>
          <td>11-11-18 21:21</td>
          <td>20000</td>
          <td>Approved</td>
                </tr>
              </tbody>
            </table>


      <br><br>
      <button style = "background-color:red;float:right;margin-left:5px;" type="button" class="btn btn-primary"><a href="/admin/reportform">Back</a></button>
      <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary">Download PDF</button>
		  <br><br>
    </form>


		</div>
        </div>
      </div>

@endsection
