@section('sidebar-brand')

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

            <li><a href="/">Logout</a></li>
          </ul>

        </div>
      </div>
    </nav>

<!-- side navigation -->

        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li style = "background-color:#3ce1e0;">
            <!-- Sidebar user panel -->
              <div class="user-panel">
              <div class="pull-left image">
              <img src="/img/users/user2-160x160.jpg" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
              <p style = "color:black;">Thrift Apparel</p>
              <p style = "font-size:12px;color:teal;">Merchant</p>
              </div>
              </div>
            </li>
            <li @if(request()->segment(1)=='brand' AND (request()->segment(2)=='bazaars' OR request()->segment(2)=='bazaar' OR request()->segment(2)=='stalls')) class="active" @endif ><a href="/brand/bazaars">Bazaars</a></li>
            <li @if(request()->segment(1)=='brand' AND (request()->segment(2)=='reservations' OR request()->segment(2)=='update_payment')) class="active" @endif ><a href="/brand/reservations">Reservations</a></li>
            <li @if(request()->segment(1)=='brand' AND (request()->segment(2)=='billing' OR request()->segment(2)=='bill')) class="active" @endif ><a href="/brand/billing">Billing</a></li>
            <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='products') class="active" @endif ><a href="/brand/products">Products</a></li>
            <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='calendar') class="active" @endif ><a href="/brand/calendar">Calendar</a></li>
            <li @if(request()->segment(1)=='brand' AND request()->segment(2)=='settings') class="active" @endif ><a href="/brand/settings">Account Settings</a></li>           
          </ul>
        </div>

<!-- This will call the child of the sidebar that varies on the page. it may or may not have child -->
@show
