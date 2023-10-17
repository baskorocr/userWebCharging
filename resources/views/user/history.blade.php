@extends('user.base.base')

@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('user.index') }}">Dashboard</a> /</span> Transaction</h4>

              <!-- Accordion -->
              <h5 class="mt-4">Transactions Success</h5>
              <div class="row">
                <div class="col-md mb-4 mb-md-2">
                  <small class="text-light fw-medium">History</small>
                  <div class="accordion mt-3" id="accordionExample">
                    
                    @php
                        $count = count($history['data'])
                    @endphp
                        
                    
                    @for ($i=0; $i < $count; $i++)
                        
        
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="heading{{ $history['data'][$i]['id'] }}">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordion{{ $history['data'][$i]['id'] }}"
                          aria-expanded="false"
                          aria-controls="accordion{{ $history['data'][$i]['id'] }}">
                          {{ $history['data'][$i]['id'] }} <br>
                          Date/Time : {{ $history['data'][$i]['created_at']  }}
                        </button>
                      </h2>
                      <div
                        id="accordion{{ $history['data'][$i]['id'] }}"
                        class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $history['data'][$i]['id'] }}"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 col-sm-2">Data kWh :</div>
                                    <div class="col-6 col-sm-2">{{ $history['data'][$i]['kWh'] }} kWh</div>
                                   

                                    <!-- Force next columns to break to new line at md breakpoint and up -->
                                    <div class="w-100 d-none d-md-block"></div>
                                    <div class="col-6 col-sm-2">Total Fee :</div>
                                    <div class="col-6 col-sm-2">{{ $history['data'][$i]['total'] }}</div>
                                    <div class="w-100 d-none d-md-block"></div>
                                    <div class="col-6 col-sm-2">Status :</div>
                                    <div class="col-6 col-sm-2">{{ $history['data'][$i]['statusPayment'] }}</div>
                                    <div class="w-100 d-none d-md-block"></div>
                                    <div class="col-6 col-sm-2">Payment :</div>
                                    <div class="col-6 col-sm-8">{{ $history['data'][$i]['paymentMethod'] }}</div>
                                    
                                </div>
                          
                        </div>
                            
                      </div>
                    </div>
                    @endfor
                   @php
                
                      $keyLast = array_key_last($history['links']);
                      $keyFirst = array_key_first($history['links']);

                   @endphp
                  
              
                  
                    <div class=" d-flex justify-content-center mt-4 mb-4 me-2">
                      <div class="row">
                        <div class="col">
                          <form action="{{ route('user.posthistory') }}">
                             @csrf
                             @if ( $history['links'][$keyFirst]['url'] == null)                           
                            <button disabled type="submit" name="link" value="{{ $history['links'][$keyFirst]['url']}}" class="btn btn-primary">
                              <span class="bx bxs-left-arrow pe-2"></span>Back
                            </button>
                            @else
                            <button type="submit" name="link" value="{{ $history['links'][$keyFirst]['url']}}" class="btn btn-primary">
                              <span class="bx bxs-left-arrow pe-2"></span>Back
                            </button>
                             @endif
                          </form>
                          
                        </div>
                        <div class="col">
                          <form action="{{ route('user.posthistory') }}" method="post">
                            @csrf
                            
                            @if($history['links'][$keyLast]['url'] == null)

                            <button disabled type="submit" name="link" value="{{ $history['links'][$keyLast]['url'] }}" class="btn btn-primary">
                              Next <span class="bx bxs-right-arrow ps-2"></span>
                            </button>
                            @else
                            <button type="submit" name="link" value="{{ $history['links'][$keyLast]['url'] }}" class="btn btn-primary">
                              Next <span class="bx bxs-right-arrow ps-2"></span>
                            </button>
                            @endif
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!--/ Accordion -->
    </div>
</div>
@endsection