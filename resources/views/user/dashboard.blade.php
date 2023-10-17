@extends('user.base.base')

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
                          <h5 class="card-title text-primary heading">Welcome {{ $total['name']}}🎉</h5>
                          <p class="mb-4">
                            Enjoy the convenience of charging your electric vehicle with us.
                          </p>

                          <a href="{{ route('user.map') }}" class="btn btn-sm btn-outline-primary">Charging Area Map</a>
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
                <div class="col-lg-5 col-md-6 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                          
                            <div class="row d-flex justify-content-start">
                              <div class="col-4">
                                <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded" height="40"/>
                              </div>
                              <div class="col pt-3"><h5>kWh</h5></div>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Month {{ $month }}</span>
                          <h3 class="card-title mb-2 mt-3">{{ $total['total_kWh'] }} kWh</h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-5">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="col-3">
                                <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="chart success"
                                class="rounded" height="40"/>
                              </div>
                              <div class="col pt-3"><h5>Transaction</h5></div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span>Month {{ $month }}</span>
                          <h3 class="card-title text-nowrap mb-1 mt-3">{{ $total['total_paid_payments'] }}</h3>
                     
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