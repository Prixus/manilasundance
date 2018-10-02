@section('sidebar-brand')

@if(request()->segment(1)=='brand' AND request()->segment(2)=='stalls' AND request()->segment(3)!='viewbill')
      <!-- top navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <img style="width:30px;height:30px;margin-top:10px;margin-right:10px;float:left;" src="/img/mslogo/mslogo.png" alt="Manila Sundance Logo">
                <a class="navbar-brand">Manila Sundance</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="leave"><a href="#">Logout</a></li>
                </ul>

              </div>
            </div>
          </nav>

      <!-- side navigation -->

              <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                  <li style = "background-color:rgb(153, 237, 199);">
                  <!-- Sidebar user panel -->
                    <div class="user-panel">
                      <div class="pull-left image">
                        <img onerror="this.src='/img/users/profilepicture.jpg'" src="/{{$currentAccount->Account_ProfilePicture}}" class="img-circle" alt="User Image">
                      </div>
                      <div class="pull-left info">
                      <p style = "color:black;">{{$currentAccount->Account_UserName}}</p>
                      <p style = "font-size:12px;color:teal;">{{$currentAccount->Account_AccessLevel}}</p>
                      </div>
                    </div>
                  </li>
                  <li class="active leave"><a href="#">Bazaars</a></li>
                  <li class="leave"><a href="#">Reservations</a></li>
                  <li class="leave"><a href="#">Billing</a></li>
                  <li class="leave"><a href="#">Products</a></li>
                  <li class="leave"><a href="#">Calendar</a></li>
                  <li class="leave"><a href="#">Account Settings</a></li>
                  <li class="leave"><a href="#">Payment History</a></li>

                  <li class="leave"><a href="#">Notifications @if($currentAccount->unreadNotifications->count() > 0)<span style="float:right;"
                      class="badge alert-danger">{{$currentAccount->unreadNotifications->count()}}</a></li>
                  @else
                  </a></li>
                  @endif


                </ul>


              </div>

      <!-- This will call the child of the sidebar that varies on the page. it may or may not have child -->

@else
      <!-- top navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <img style="width:30px;height:30px;margin-top:10px;margin-right:10px;float:left;" src="/img/mslogo/mslogo.png" alt="Manila Sundance Logo">
                <a class="navbar-brand" href="#">Manila Sundance</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="/logout/{{$currentAccount->Account_AccessLevel}}">Logout</a></li>
                </ul>
              </div>
            </div>
          </nav>

      <!-- side navigation -->

              <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                  <li style = "background-color:rgb(153, 237, 199);">
                  <!-- Sidebar user panel -->
                    <div class="user-panel">
                      <div class="pull-left image">
                        <img onerror="this.src='/img/users/profilepicture.jpg'" src="/{{$currentAccount->Account_ProfilePicture}}" class="img-circle" alt="User Image">
                			</div>
              				<div class="pull-left info">
              				<p style = "color:black;">{{$currentAccount->Account_UserName}}</p>
              				<p style = "font-size:12px;color:teal;">{{$currentAccount->Account_AccessLevel}}</p>
              				</div>
                    </div>
                  </li>
                  <li @if(request()->segment(1)=='brand' AND (request()->segment(2)=='bazaars' OR request()->segment(2)=='bazaar' OR request()->segment(2)=='stalls')) class="active" @endif ><a href="/brand/bazaars">Bazaars</a></li>
                  <li @if(request()->segment(1)=='brand' AND (request()->segment(2)=='reservations' OR request()->segment(2)=='update_payment')) class="active" @endif ><a href="/brand/reservations">Reservations</a></li>
                  <li @if(request()->segment(1)=='brand' AND (request()->segment(2)=='billing' OR request()->segment(2)=='bill')) class="active" @endif ><a href="/brand/billing">Billing</a></li>
                  <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='products') class="active" @endif ><a href="/brand/products">Products</a></li>
                  <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='calendar') class="active" @endif ><a href="/brand/calendar">Calendar</a></li>
                  <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='settings') class="active" @endif ><a href="/brand/settings">Account Settings</a></li>
                  <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='paymenthistory') class="active" @endif ><a href="/brand/paymenthistory">Payment History</a></li>


                  <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='notifs') class="active" @endif ><a href="/brand/notifs">Notifications @if($currentAccount->unreadNotifications->count() > 0)<span style="float:right;"
                      class="badge alert-danger">{{$currentAccount->unreadNotifications->count()}}</a></li>
                  @else
                  </a></li>
                  @endif


                </ul>


              </div>

      <!-- This will call the child of the sidebar that varies on the page. it may or may not have child -->

@endif

@show
