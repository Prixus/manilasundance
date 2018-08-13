<img src = "img/mslogo/logo1.png" style="margin:5px 0 0 600px;">
<div id="navbar" class="navbar-collapse collapse container">
          <ul class="nav navbar-nav navbar-right">
            <li style = "padding-top:13px;"><input class = "searchtxt" type = "text" placeholder = "Search..."></li>
            <li style = "padding-top:13px;margin-right:10px;font:12px;"><button class = "btnSearch searchbtn">GO</button></li>
            <li <?php if(request()->segment(1)=='signup'): ?> class="activenav" <?php endif; ?> ><a href="/signup">Sign Up</a></li>
            <li <?php if(request()->segment(1)=='login'): ?> class="activenav" <?php endif; ?>><a href="/login">Login</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li <?php if(request()->segment(1)==''): ?> class="activenav" <?php endif; ?> ><a href="/">HOME</a></li>
            <li <?php if(request()->segment(1)=='bazaar'): ?> class="activenav" <?php endif; ?> ><a href="/bazaar">BAZAAR</a></li>
            <li class="dropdown" <?php if(request()->segment(1)=='brands'): ?> style = "background-color:#ffffa8;" class="dropdown activenav" <?php endif; ?> ><a href="/brands" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >BRANDS</a>
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

<hr class="featurette-divider" style = "background-color:#3ce1e0;margin:0 0 30px 5%;height:8px;width:90%;">