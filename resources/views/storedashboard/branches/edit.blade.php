@extends("layouts.storeindex")
@section("content")
<form action="{{route('branches.update',$branch->id)}}"  method ="post" enctype="multipart/form-data" class="avatar-upload">
    @csrf
    @method('PUT')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__("messages.addbranch")}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- ============= Upload image ============= -->
                <div class="upload_img">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" class="{{ $errors->has('email') ? 'alert alert-danger' : '' }}" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview container2">
                        <div id="imagePreview" style="background-image:url({{asset($branch->image)}})">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                </div>
                <!-- ============= Upload image ============= -->
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                                $('#imagePreview').hide();
                                $('#imagePreview').fadeIn(650);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#imageUpload").change(function() {
                        readURL(this);
                    });
                </script>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.name')}}
                        </label>
                        <input type="text" name="name" value="{{$branch->name}}" 
                        class="form-control" placeholder="{{__('messages.name')}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label>
                            {{__('messages.state')}}
                            <!-- <span class="text-danger">AR</span> -->
                        </label>
                        <select class="form-control selectpicker" name="state_id"
                         onchange="getstorecities(this)" data-live-search="true">
                            @foreach($states as $state)
                            <option value="{{$state->id}}" 
                                @if($branch->state_id == $state->id) selected @endif
                                >{{$state->title}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label>
                            {{__('messages.city')}}
                            <!-- <span class="text-danger">AR</span> -->
                        </label>
                        <select class="form-control selectpicker" name="city_id" id="city" 
                         onchange="getstorezones(this)"  data-live-search="true">
                           
                         <option value="{{$branch->city_id}}">{{$branch->city->title}}</option>
                        </select>
                    </div>
                </div> <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label>
                            {{__('messages.zone')}}
                            <!-- <span class="text-danger">AR</span> -->
                        </label>
                        <select class="form-control selectpicker" required id="zone" name="zone_id"  data-live-search="true">
                            <option value="{{$branch->zone_id}}">{{$branch->zone->title}}</option>
                           
                        </select>
                    </div>
                    </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.phone')}}
                        </label>
                        <input type="number" name="phone"  value="{{$branch->phone}}" class="form-control" placeholder="{{__('messages.phone')}}">
                    </div>
                </div>

            
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.whats_up')}} 
                        </label>
                        <input type="number" name="whats_up" class="form-control" value="{{$branch->whats_up}}"
                        placeholder=" {{__('messages.whats_up')}}  ">
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>
                            {{__("messages.address")}}
                        </label>
                        <input type="text" class="form-control" value="{{$branch->address}}" name="address" placeholder="{{__('messages.address')}}">
                    </div>
                </div>

                <div class="col-12">
                    <div id="map">
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-12">
                    <label>lat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control " value="{{$branch->lat}}" id="Lat" name="lat" />
                   </div>
              <div class="form-group col-lg-4 col-md-12">
                    <label>lon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control " value="{{$branch->lon}}"  id="Lng" name="lon" />
                   </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
            </div>
        </div>
</form>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        let lat1 = $('#Lat').val();
           let lng1 =   $('#Lng').val();
        var myLatlng = new google.maps.LatLng(lat1, lng1);

        var mapOptions = {
            center: myLatlng,
            zoom: 14
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'I move with you man :)'
        });

        google.maps.event.addListener(map, 'click', function(e) {
            //marker.setPosition(e.latLng);
            map.panTo(e.latLng)
            var Lat = e.latLng.lat();
                    var Lng = e.latLng.lng();
                    $('#Lat').val(Lat);
                    $('#Lng').val(Lng);
            //map.setCenter(e.latLng);
        });
        
        google.maps.event.addListener(map, 'center_changed', function() {
            var center = map.getCenter();
            marker.setPosition(center);

            window.setTimeout(function() {
                geocodeLatLng(geocoder, map, infowindow, marker);
            }, 2000);
        });
    }

    function geocodeLatLng(geocoder, map, infowindow, marker) {
        geocoder.geocode({
            'location': marker.position
        }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                console.log(results);
                if (results[1]) {
                    //map.setZoom(11);
                    infowindow.setContent(results[1].formatted_address);
                    infowindow.open(map, marker);
                } else {
                    console.warn('GeoCoder: No results found');
                }
            } else {
                console.warn('Geocoder failed due to: ' + status);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    function getstorecities(sel){
    let id = sel.value;
 console.log(sel);
 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      
    $.ajax({
        type:'get',
       url: `../getstorecities/${id}`,
   //    contentType: "application/json; charset=utf-8",
       dataType: "Json",
       success: function(result){
           if(result.status == true){
       $("#city").empty();
       $("#city").html(result.data);
       $("#city").selectpicker("refresh");
           }
         }
    });
    } 
     function getstorezones(sel){
    let id = sel.value;
 console.log(sel);
 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      
    $.ajax({
        type:'get',
       url: `../getstorezones/${id}`,
   //    contentType: "application/json; charset=utf-8",
       dataType: "Json",
       success: function(result){
           if(result.status == true){
       $("#zone").empty();
       $("#zone").html(result.data);
       $("#zone").selectpicker("refresh");
           }
         }
    });
    }
</script>
@endsection