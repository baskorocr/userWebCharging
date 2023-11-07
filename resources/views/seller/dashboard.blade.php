@extends('seller.base.base')

@section('content')

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-7 mb-5 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary heading">Welcome {{$seller[0]['name']}}🎉</h5>
                          <p class="mb-4">
                            Enjoy the convenience of charging your electric vehicle with us.
                          </p>

                          <a href="#" class="btn btn-sm btn-outline-primary">Charging Area Map</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="130"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
 
                
              </div>
              
            </div>
               
                    
            <!-- / Content -->

            

            <div class="content-backdrop fade"></div>
</div>

@endsection