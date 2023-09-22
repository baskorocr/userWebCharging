<nav class="navbar navbar-expand-lg fixed-top py-3 backdrop" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="{{ route('index') }}"> <img class="d-inline-block align-top img-fluid" src="images/logo.png" alt="" width="180" /><span class="text-primary fs-4 ps-2"></span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon" ><i class="fa fa-bars" aria-hidden="true" style="color:#00000"></i></span></button>
          <div class="collapse navbar-collapse  border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent" >
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
              <li class="nav-item"><a class="nav-link text-600" href="#places">Charging Area</a></li>
              <li class="nav-item"><a class="nav-link text-600" href="#featuresVideos">Video</a></li>
              <li class="nav-item"><a class="nav-link text-600" href="#booking">Booking </a></li>
            </ul>
            <form class="ps-lg-5">
              
              <a class="btn btn-lg btn-outline-primary order-0" href="{{ route('login') }}" role="button">Sign In</a>
            </form>
          </div>
        </div>
</nav>