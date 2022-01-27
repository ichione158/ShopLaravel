<!-- header -->
<header id="default_header" class="header_style_1">
    <!-- header top -->
    <div class="header_top">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="full">
              <div class="topbar-left">
                <ul class="list-inline">
                  <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">540 Lorem Ipsum New York, AB 90218</span> </li>
                  <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></span> </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 right_section_header_top">
            <div class="float-left">
              <div class="social_icon">
                <ul class="list-inline">
                  <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                  <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                  <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                  <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                  <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                </ul>
              </div>
            </div>
            <div class="float-right">
              <div class="make_appo"> <a class="btn white_btn" href="make_appointment.html">Make Appointment</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end header top -->
    <!-- header bottom -->
    <div class="header_bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <!-- logo start -->
            <div class="logo"> <a href="/"><img src="{{URL::asset('front-end/images/logos/Sketchy_logo_4.png')}}" alt="logo" /></a> </div>
            <!-- logo end -->
          </div>
          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <!-- menu start -->
            <div class="menu_side">
              <div id="navbar_menu">
                <ul class="first-ul">
                  <li> <a class="{{ Request::url() == Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                  </li>
                  <li><a href="it_about.html">About Us</a></li>
                  {{-- <li> <a href="it_blog.html">Blog</a>
                    <ul>
                      <li><a href="it_blog.html">Blog List</a></li>
                      <li><a href="it_blog_grid.html">Blog Grid</a></li>
                      <li><a href="it_blog_detail.html">Blog Detail</a></li>
                    </ul>
                  </li> --}}
                  <li> <a href="/" class="{{ request()->is('cart*') ? 'active' : '' }}" >Shop</a>
                    <ul>
                      <li><a href="/">Shop List</a></li>
                      <li><a href="{{ route('cart.list') }}">Shopping Cart</a></li>
                    </ul>
                  </li>
                  <li> <a href="{{ route('contact') }}">Contact</a>
                  </li>
                  @if(!empty(Auth::user()))
                  <li> <a href="#" class="{{ request()->is('user*') ? 'active' : '' }}">Hello: <?= Auth::user()->name ?></a>
                    <ul>
                      <li><a href="{{ route('user.view_change_password') }}">Profile</a></li>
                      <li><a href="{{ route('user.order') }}">Order</a></li>
                      @if(Auth::user()->status == 2)
                      <li><a href="{{ route('admin') }}">Page Admin</a></li>
                      @endif
                      <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                  </li>
                  @else
                  <li> <a href="{{ route('login') }}">Login</a></li>
                  <li> <a href="#">Resign</a></li>
                  @endif
                </ul>
              </div>
              {{-- <div class="search_icon">
                <ul>
                  <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                </ul> --}}
              </div>
            </div>
            <!-- menu end -->
          </div>
        </div>
      </div>
    </div>
    <!-- header bottom end -->
</header>
<!-- end header -->