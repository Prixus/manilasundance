@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h1 class="page-header">ADMINISTRATOR</h1>
 
	
		
          <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> Reports</h3>

              <p>February</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">See Past Reports <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>100,000<sup style="font-size: 20px"></sup></h3>

              <p>Revenue</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">See Table <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">See Table <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Reservations</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">See Table <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>     
      
          <table class="table table-striped">
          <h2 class="sub-header">February Reservations<div style = "float:right;font-size:14px;">
          <input type = "text" placeholder = "Search...">
					<button class = "btnSearch">GO</button>
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
		  
		  
		</div>
        </div>
      </div>

@endsection