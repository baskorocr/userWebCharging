@extends('user.base.base')

@section('content')


      <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('user.index') }}">Dashboard</a> /</span> Map</h4>

              <!-- Accordion -->
              <h5 class="mt-4">Map Charging</h5>
              <div class="row">
                <div class="col-md mb-4 mb-md-2 d-flex justify-content-start">
                
                  <div id="map"></div>
                </div>

              </div>
              <!--/ Accordion -->
    </div>
</div>


     

<script type="text/javascript">
         var map = L.map('map').setView([-6.200000,106.816666,], 9);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          var ev = L.icon({
            iconUrl: '{{URL::asset('assets/img/ev.png')}}',
            iconSize: [40, 40]
        });
        

           var data = [
                @php
                    $count = count($station);
                    for ($i=0; $i<$count; $i++) {
                        if ($station[$i]['Lat'] == null) {
                            continue;
                        }
                @endphp 
                        {
                            "lokasi": [{{ $station[$i]['Lat'] }}, {{ $station[$i]['Long'] }}],
                            "id": "{{ $station[$i]['id'] }}",
                        },
                @php
                    }
                @endphp 
            ];

       for(i in data){
      
         var marker = new L.Marker(new L.latLng(data[i]['lokasi']), {

                icon: ev
            }).addTo(map).on('click', function(e) {
              window.location = 'https://www.google.com/maps/search/?api=1&query='+e.latlng.lat+','+e.latlng.lng;
             
              });

          

          
       }

        
         
          
          


</script>
@endsection