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
            <li style = "padding-bottom;13px;padding-top:13px;"><input type = "text" placeholder = "Search..."></li>
            <li style = "padding-bottom;13px;padding-top:13px;margin-right:10px;"><button class = "btnSearch">GO</button></li>
            <li @if(request()->segment(1)=='signup') class="active" @endif ><a href="/signup">Sign Up</a></li>
            <li @if(request()->segment(1)=='login') class="active" @endif><a href="/login">Login</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li @if(request()->segment(1)=='') class="active" @endif ><a href="/">HOME</a></li>
            <li @if(request()->segment(1)=='bazaar') class="active" @endif ><a href="/bazaar">BAZAAR</a></li>
            <li class="dropdown" @if(request()->segment(1)=='brands') class="dropdown active" @endif ><a href="/brands" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >BRANDS<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/brands">All Categories</a></li>
                <li role="separator" class="divider" style="padding:0px;margin:2px;"></li>
                <li><a href="#">Clothing</a></li>
                <li role="separator" class="divider" style="padding:0px;margin:2px;"></li>
                <li><a href="#">Makeup</a></li>
                <li role="separator" class="divider" style="padding:0px;margin:2px;"></li>
                <li><a href="#">Foods</a></li>
                <li role="separator" class="divider" style="padding:0px;margin:2px;"></li>
                <li><a href="#">Technology</a></li>
                <li role="separator" class="divider" style="padding:0px;margin:2px;"></li>
                <li><a href="#">School Supplies</a></li>
                <li role="separator" class="divider" style="padding:0px;margin:2px;"></li>
                <li><a href="#">Accessories</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>