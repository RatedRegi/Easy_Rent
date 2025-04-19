<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Healet</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('build/landlord/css/bootstrap.css')}}" />
  <!-- font awesome style -->
  <link href="{{asset('build/landlord/css/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('build/landlord/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('build/landlord/css/responsive.css')}}" rel="stylesheet" />

  {{-- Map Style  --}}
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="{{asset('build/vendor/bootstrap/css/bootstrap.min.css')}}">

      <link rel="stylesheet" href="{{asset('build/assets/css/fontawesome.css')}}">
      <link rel="stylesheet" href="{{asset('build/assets/css/templatemo-plot-listing.css')}}">
      <link rel="stylesheet" href="{{asset('build/assets/css/animated.css')}}">
      <link rel="stylesheet" href="{{asset('build/assets/css/owl.css')}}">

</head>

<body>

  <!-- offer section -->
  <section class="offer_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md px-0">
          <div class="box offer-box1 border border-success">
            <img src="images/o1.jpg" alt="">
            <div class="detail-box">
              <h2>
                Mkoba 5, Gweru
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="offer_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 px-0">
          <div class="box offer-box1">
            <img src="images/o1.jpg" alt="">
            <div class="detail-box">
              <h2>
                Upto 15% Off
              </h2>
              <a href="">
                Shop Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-5 px-0">
          <div class="box offer-box2">
            <img src="images/o2.jpg" alt="">
            <div class="detail-box">
              <h2>
                Upto 10% Off
              </h2>
              <a href="">
                Shop Now
              </a>
            </div>
          </div>
          <div class="box offer-box3">
            <img src="images/o3.jpg" alt="">
            <div class="detail-box">
              <h2>
                Upto 20% Off
              </h2>
              <a href="">
                Shop Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="container-fluid mb-5">
    <h4>$60/month</h4>
    <h5>1 room in Mkoba 5</h5>
</div>
  <!-- end offer section -->
<div class="container">
  <h2 class="text-center">Map</h2>
</div>
{{-- location section --}}

<div class="contact-page my-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <div class="row">
            <div class="col-lg">
              <div id="map">
                <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- location section --}}

{{-- edit section  --}}
<div class="container-fluid text-center my-5">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdate">Edit Details</button>
</div>

<form action="" method="POST">
  @csrf
  @method('PUT')
<div class="modal fade" id="ModalUpdate" tabindex="-1" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="#ModalUpdateLabel">Update Your Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="">
      </div>
      <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" class="form-control" name="surname" id="surname" value="">
      </div>
      <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="">
      </div>
      <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="number" class="form-control" name="phone_number" id="phone_number" value="">
        </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address_line" id="address" value="" placeholder="example 5512/1 Mkoba 12">
      </div>
      <div class="mb-3">
        <label for="City" class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="City" value="">
      </div>
      <div class="mb-3">
        <label for="province" class="form-label">Province</label>
          <select name="province" id="inputState" class="form-control">
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
      </div>
      <div class="mb-3">
        <label for="zip" class="form-label">zip</label>
        <input type="number" class="form-control" name="zip" id="zip" value=">
      </div>
      <div class="mb-3">
        <label for="current_password" class="form-label">Password</label>
        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter current password">
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password">
      </div>
      <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">New Password Confirmation</label>
        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm new password">
      </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="saveProduct">Save Changes</button>
    </div>
  </div> 
  </div>
</div>
</form>

{{-- end edit section  --}}

  <!-- jQery -->
  <script src="{{asset('build/landlord/js/jquery-3.4.1.min.js')}}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('build/landlord/js/bootstrap.js')}}"></script>

  {{-- Map --}}
  <script src="{{asset('build/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('build/assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('build/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('build/assets/js/animation.js')}}"></script>
  <script src="{{asset('build/assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('build/assets/js/custom.js')}}"></script>

</body>

</html>