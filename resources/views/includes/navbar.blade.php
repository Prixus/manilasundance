<!-- <center><img src = "img/mslogo/logo.png" style="height:170;width:500px;"></center>
<div id="navbar" class="navbar-collapse collapse container">
          <ul class="nav navbar-nav navbar-right">
            <li style = "padding-top:13px;"><input class = "searchtxt" type = "text" placeholder = "Search..."></li>
            <li style = "padding-top:13px;margin-right:10px;font:12px;"><button class = "btnSearch searchbtn">GO</button></li>
            <li @if(request()->segment(1)=='signup') class="activenav" @endif ><a href="/signup">Sign Up</a></li>
            <li @if(request()->segment(1)=='login') class="activenav" @endif><a href="/login">Login</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li @if(request()->segment(1)=='') class="activenav" @endif ><a href="/">HOME</a></li>
            <li @if(request()->segment(1)=='bazaar') class="activenav" @endif ><a href="/bazaar">BAZAAR</a></li>
            <li @if(request()->segment(1)=='brands') class="dropdown activenav" @endif ><a href="/brands">BRANDS</a></li>
          </ul>
        </div>
<hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0 0 30px 5%;height:8px;width:90%;">

 -->

 <div class="navbar-wrapper">
  <div class="container">

    <nav class="navbar navbar-inverse navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse container">
          <ul class="nav navbar-nav navbar-right">
            <!-- <li style = "padding-bottom;13px;padding-top:13px;font-size:14px;"><input class="searchtxt" type = "text" placeholder = "Search..."></li>
            <li style = "padding-bottom;13px;padding-top:13px;margin-right:10px;font-size:15px;"><button class = "btnSearch searchbtn">GO</button></li> -->
            <li @if(request()->segment(1)=='signup') class="active" @endif ><a href="/signup">Sign Up</a></li>
            <li @if(request()->segment(1)=='login') class="active" @endif><a href="/login">Login</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li @if(request()->segment(1)=='') class="active" @endif ><a href="/">HOME</a></li>
            <li @if(request()->segment(1)=='bazaar') class="active" @endif ><a href="/bazaar">BAZAAR</a></li>
            <li @if(request()->segment(1)=='brands') class="active" @endif ><a href="/brands">BRANDS</a></li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>


<br><br><br><br>