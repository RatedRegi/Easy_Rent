
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Plot Listing HTML5 Website Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('build/assets/bootstrap-5.0.2-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('build/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('build/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/css/templatemo-plot-listing.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/css/owl.css')}}">

 <!-- HouseView CSS -->
 <link rel="stylesheet" href="{{asset('build/HouseView/css/bootstrap-icons.css')}}">
 <link rel="stylesheet" href="{{asset('build/HouseView/css/templatemo-topic-listing.css')}}">
  <!-- End HouseView CSS -->

    <!-- Login_Register CSS -->
    <link rel="stylesheet" href="{{asset('build/Login_Register/css/style.css')}}">
      <!-- End Login_Register CSS -->
        
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('build/houses/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('build/houses/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('build/houses/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('build/houses/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('build/houses/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('build/houses/css/style.css')}}">
<!--

TemplateMo 564 Plot Listing

https://templatemo.com/tm-564-plot-listing

-->
  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{'/'}}" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="{{'/'}}" class="active">Home</a></li>
              <li><a href="{{route('contact_us')}}">Category</a></li>
              <li><a href="{{route('contact_us')}}">Contact Us</a></li> 
              @if (Auth::user())
              <li><a href="{{route('house_view')}}">Landlord</a></li>
              <li>
                  <div class="main-white-button">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                      @csrf
                      <button type="submit">
                        <i class="fa fa-plus"></i>Logout
                      </button>
                    </form>
                  </div>
             
              </li> 
              @else
              <li><div class="main-white-button"><a href="{{route('login')}}"><i class="fa fa-plus"></i> Login</a></div></li> 
              @endif
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h6>Over 36,500+ homes</h6>
            <h2>Find Nearby Places To Live</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <select name="area" class="form-select" aria-label="Area" id="chooseCategory" onchange="this.form.click()">
                          <option selected>All Areas</option>
                          <option value="Harare">Harare</option>
                          <option value="Bulawayo">Bulawayo</option>
                          <option value="Midlands">Midlands</option>
                          <option value="Masvingo">Masvingo</option>
                          <option value="Manicaland">Manicaland</option>
                          <option value="Mashonaland East">Mashonaland East</option>
                          <option value="Mashonaland Central">Mashonaland Central</option>
                          <option value="Mashonaland West">Mashonaland West</option>
                          <option value="Matabeleland North">Matabeleland North</option>
                          <option value="Matabeleland South">Matabeleland South</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <input type="address" name="address" class="searchText" placeholder="Enter a location" autocomplete="on">
                  </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <select name="price" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                          <option selected>City</option>
                          <option value="Gweru">Gweru</option>
                          <option value="Mutare">Mutare</option>
                          <option value="Kadoma">Kadoma</option>
                          <option value="Victoria Falls">Victoria Falls</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-3">                        
                  <fieldset>
                      <button class="main-button"><i class="fa fa-search"></i> Search Now</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
   
      </div>
    </div>
  </div>

@yield('content')

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="about">
            <div class="logo">
              <img src="assets/images/black-logo.png" alt="Plot Listing">
            </div>
            <p>If you consider that <a rel="nofollow" href="https://templatemo.com/tm-564-plot-listing" target="_parent">Plot Listing template</a> is useful for your website, please <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little via PayPal.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="helpful-links">
            <h4>Helpful Links</h4>
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <ul>
                  <li><a href="#">Categories</a></li>
                  <li><a href="#">Reviews</a></li>
                  <li><a href="#">Listing</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Awards</a></li>
                  <li><a href="#">Useful Sites</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-us">
            <h4>Contact Us</h4>
            <p>27th Street of New Town, Digital Villa</p>
            <div class="row">
              <div class="col-lg-6">
                <a href="#">010-020-0340</a>
              </div>
              <div class="col-lg-6">
                <a href="#">090-080-0760</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sub-footer">
            <p>Copyright © 2025 Easy Rent., Ltd. All Rights Reserved.
            <br>
            Rated Regi <a rel="nofollow" href="#" title="">Designed</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="{{asset('build/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('build/assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('build/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('build/assets/js/animation.js')}}"></script>
  <script src="{{asset('build/assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('build/assets/js/custom.js')}}"></script>


  <script src="{{asset('build/Login_Register/js/script.js')}}"></script>
  <script src="{{asset('build/HouseView/js/click-scroll.js')}}"></script>
  <script src="{{asset('build/HouseView/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('build/HouseView/js/custom.js')}}"></script>
  <!-- loader -->


  <script src="{{asset('build/houses/js/jquery.min.js')}}"></script>
  <script src="{{asset('build/houses/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('build/houses/js/popper.min.js')}}"></script>
  <script src="{{asset('build/houses/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('build/houses/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('build/houses/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('build/houses/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('build/houses/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('build/houses/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('build/houses/js/aos.js')}}"></script>
  <script src="{{asset('build/houses/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('build/houses/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('build/houses/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('build/houses/js/scrollax.min.js')}}"></script>
  <script src="{{asset('build/houses/js/main.js')}}"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

</body>

</html>
