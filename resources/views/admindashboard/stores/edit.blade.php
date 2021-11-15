@extends("layouts.adminindex")
@section("content")
<form action="{{route('stores.update',$store->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
            {{__('messages.editstore')}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.name')}}                     
                               
                        </label>
                        <input type="text" name="name" value="{{$store->name}}" required class="form-control" placeholder="  {{__('messages.name')}} " />
                    </div>
                </div>
                <!-- For loop this div -->

                <!-- For loop this div -->
                <!-- <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            اسم المتجر
                            <span class="text-danger">EN</span>
                        </label>
                        <input type="text" class="form-control" placeholder="اسم المتجر" />
                    </div>
                </div> -->
                <!-- For loop this div -->
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.major')}}      
                        </label>
                        <select data-live-search="true" data-live-search-style="startsWith" required
                        name="major_id" class="form-control selectpicker" title="{{__('messages.major')}}">
                           @foreach($majors as $major)
                          <option value="{{$major->id}}"  @if($store->major_id == $major->id) selected @endif>{{$major->title}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            {{__('messages.language')}}
                        </label>
                        <select data-live-search="true" name="lang[]" required data-live-search-style="startsWith" 
                        class="form-control selectpicker" multiple="multiple" title="  {{__('messages.language')}}">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <option value="{{$localeCode}}"
                             @if(in_array($localeCode,$store->languages()->pluck("lang")->toArray())) selected @endif>{{$localeCode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.cr_no')}}
                        </label>
                        <input type="number" class="form-control" value="{{$store->cr_no}}" required name="cr_no" placeholder="{{__('messages.cr_no')}}" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                    <label>
                           {{__('messages.tax_number')}}
                        </label>
                        <input type="number" class="form-control" required value="{{$store->tax_number}}" name="tax_number" placeholder="{{__('messages.tax_number')}}" />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                            {{__('messages.responsible_name')}} 
                        </label>
                        <input type="text"  name="responsible_name" value="{{$store->responsible_name}}" required class="form-control" placeholder=" {{__('messages.responsible_name')}} " />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.responsible_phone')}}
                        </label>
                        <input type="number"  required name="responsible_phone" class="form-control"
                         placeholder=" {{__('messages.responsible_phone')}} " value="{{$store->responsible_phone}}"/>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.sales_officer')}} 
                        </label>
                        <input type="text" required  name="sales_officer" class="form-control"
                         placeholder=" {{__('messages.sales_officer')}} " value="{{$store->sales_officer}}" />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.email')}}  
                        </label>
                        <input type="email" required class="form-control" value="{{$store->email}}" name="email" placeholder="   {{__('messages.email')}} " />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.phone')}} 
                        </label>
                        <input type="number" required class="form-control" value="{{$store->phone}}" name="phone" placeholder="    {{__('messages.phone')}} " />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.password')}} 
                        </label>
                        <input type="password" id="txtPassword" nmae="password" 
                         class="form-control" placeholder="{{__('messages.password')}} " />
                        <button type="button" id="btnToggle" class="toggle">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                    <!-- =========== show password =========== -->
                    <script>
                        let passwordInput = document.getElementById('txtPassword'),
                            toggle = document.getElementById('btnToggle'),
                            icon = document.getElementById('eyeIcon');

                        function togglePassword() {
                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                // icon.classList.add("fa-eye-slash");
                                toggle.innerHTML = '<i class="fa fa-eye"></i>';
                            } else {
                                passwordInput.type = 'password';
                                // icon.classList.remove("fa-eye-slash");
                                toggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
                            }
                        }

                        function checkInput() {
                            //if (passwordInput.value === '') {
                            //toggle.style.display = 'none';
                            //toggle.innerHTML = 'show';
                            //  passwordInput.type = 'password';
                            //} else {
                            //  toggle.style.display = 'block';
                            //}
                        }

                        toggle.addEventListener('click', togglePassword, false);
                        passwordInput.addEventListener('keyup', checkInput, false);
                    </script>
                    <!-- =========== show password =========== -->
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.state')}}
                        </label>
                        <select data-live-search="true" onchange ="getcities(this)"  name="state_id"
                        class="form-control selectpicker" >
                            @foreach($states as $state)
                                <option value="{{$state->id}}" @if($store->state_id == $state->id) selected @endif>{{$state->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.city')}}
                        </label>
                        <select data-live-search="true"  name="city_id" 
                        data-hide-disabled="true"
                       id="city" onchange="getzones(this)" 
                        class="form-control selectpicker" >
                        @foreach($cities as $city)
                            <option value="{{$city->id}}"  @if($store->city_id == $city->id) selected @endif>{{$city->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.zone')}}
                        </label>
                        <select data-live-search="true" id="zone" 
                         name="zone_id" data-live-search-style="startsWith"
                         class="form-control selectpicker" >
                        @foreach($zones as $zone)
                            <option value="{{$zone->id}}" @if($store->zone_id == $zone->id) selected @endif>{{$zone->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="form-group">
                        <label>
                        
                        {{__('messages.contract_image')}}
                        </label>
                        <div class="d-flex">
                            <input id="uploadFile" class="f-input form-control" disabled />
                            <div class="fileUpload btn btn--browse">
                                <span>Browse</span>
                                <input id="uploadBtn" type="file" name="contract_image" class="upload" />
                            </div>
                        </div>
                        <script>
                            document.getElementById("uploadBtn").onchange = function() {
                                document.getElementById("uploadFile").value = this.value.replace("C:\\fakepath\\", "");
                            };
                        </script>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="form-group">
                        <label>
                        {{__('messages.logo')}}
                        </label>
                        <div class="d-flex">
                            <input id="uploadFileLogo" class="f-input form-control" disabled />
                            <div class="fileUpload btn btn--browse">
                                <span>Browse</span>
                                <input id="uploadBtnLogo" type="file" name="logo" class="upload" />
                            </div>
                        </div>
                        <script>
                            document.getElementById("uploadBtnLogo").onchange = function() {
                                document.getElementById("uploadFileLogo").value = this.value.replace("C:\\fakepath\\", "");
                            };
                        </script>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.comment')}}
                        </label>
                        <textarea class="form-control" name="comment" id="" cols="30" rows="5">{{$store->comment}}</textarea>
                    </div>
                </div>
                <!-- <div class="col-12">
                    <div class="right_col" role="main">
                        <div class="search"></div>
                        <div class="row">
                             <div id="map"></div>
                            <div class="container" id="advanced-search-form"></div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6"> 
                  {{__('messages.save')}}</button>
        </div>
    </div>
</form>



<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true&libraries=drawing,geometry">
</script>

<script>
    var coordinates = [];
    var all_shapes = [];

    var selectedShape;
    var selectedArea;
</script>

<script>
    function draw_shape() {
        // // var areas = <?php
                            // //             echo $latlng;
                            // //             
                            ?>

        // for (var j = 0; j < areas.length; j++) {
        //     // var latlngs = areas[j].latlng;
        //     const latlngsObj = JSON.parse(latlngs);
        //     const bermudaTriangle = new google.maps.Polygon({
        //         paths: latlngsObj,
        //         strokeColor: "#FF0000",
        //         strokeOpacity: 0.8,
        //         strokeWeight: 2,
        //         fillColor: "#FF0000",
        //         fillOpacity: 0.35,
        //         area: areas[j]
        //     });
        //     google.maps.event.addListener(bermudaTriangle, 'click', function() {
        //         var area = this.area;
        //         setSavedAreaSelectionSelection(area, this);
        //     });
        //     bermudaTriangle.setMap(map);
        // }
    }
</script>

<script>
    function clearSelection() {
        if (selectedShape) {
            selectedShape.setEditable(false);
            selectedShape = null;
        }
        if (selectedArea) {
            selectedArea = null;
        }
    }

    function setSelection(shape) {

        clearSelection();
        selectedShape = shape;
        shape.setEditable(true);
    }

    function setSavedAreaSelectionSelection(area, shape) {
        clearSelection();
        selectedShape = shape;
        selectedArea = area;
        shape.setEditable(true);
    }

    function deleteSelectedShape() {
        if (selectedShape) {
            selectedShape.setMap(null);
        }
        if (selectedArea) {

            $.ajax({
                type: "GET",
                url: "{{url('ciadmin/Area/delete')}}" + "/" + selectedArea.id,
                contentType: "application/json; charset=utf-8",
                dataType: "Json",
                success: function(result) {
                    if (result == "true") {
                        $('#exampleModalDele' + id).modal('hide');
                        $('#delete' + id).remove();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'تم الحذف ',
                            showConfirmButton: false,
                            timer: 2000
                        })

                    }
                }
            });
        }
        clearSelection();
    }
</script>

<script>
    function save_coordinates_to_array(newShapeArg) {
        var polygonBounds = newShapeArg.getPath();

        for (var i = 0; i < polygonBounds.length; i++) {
            var point = polygonBounds.getAt(i);
            var item = {
                "lat": point.lat(),
                "lng": point.lng()
            };
            coordinates.push(item);
        }
        var fPoint = polygonBounds.getAt(0);
        var item = {
            "lat": fPoint.lat(),
            "lng": fPoint.lng()
        };
        coordinates.push(fPoint);
        //alert('points '+JSON.stringify(coordinates));
        var points = JSON.stringify(coordinates);
        var waiting = document.getElementById("waiting").value;
        var Kilometercost = document.getElementById("Kilometercost").value;
        var countcounter = document.getElementById("countcounter").value;
        var placename = document.getElementById("placename").value;
        var percentdelivery = document.getElementById("percentdelivery").value;

        $.ajax({
            type: "GET",
            url: "{{url('ciadmin/maps/store')}}",
            contentType: "application/json; charset=utf-8",
            dataType: "Json",
            data: {
                points: points,
                waiting: waiting,
                Kilometercost: Kilometercost,
                countcounter: countcounter,
                placename: placename,
                percentdelivery: percentdelivery,
            },
            success: function(result) {

                if (result == 1) {
                    Swal.fire({
                        position: 'top-start',
                        icon: 'success',
                        title: 'تم الاضافه ',
                        showConfirmButton: false,
                        timer: 2000
                    })

                } else {
                    Swal.fire({
                        position: 'top-start',
                        icon: 'success',
                        title: '  تمت الاضافه من قبل ',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                setTimeout(function() { // wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                });
            }
        });

    }
</script>

<script>
    var map;
    var id = 0;
    var newShape;

    function initialize() {

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(30.033333, 31.233334)
        });

        draw_shape();

        // Create the DIV to hold the control and call the CustomControl() constructor passing in this DIV.
        var saveControlDiv = document.createElement('div');
        var saveControl = new SaveControl(saveControlDiv, map);
        saveControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(saveControlDiv);
        // Create the DIV to hold the control and call the CustomControl() constructor passing in this DIV.
        var deleteControlDiv = document.createElement('div');
        var deleteControl = new DeleteControl(deleteControlDiv, map);
        deleteControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(deleteControlDiv);

        var drawingManager = new google.maps.drawing.DrawingManager();
        drawingManager.setOptions({
            drawingControlOptions: {
                position: google.maps.ControlPosition.BOTTOM_LEFT,
                drawingModes: ['polygon', 'marker']
            },
            polygonOptions: {
                fillColor: "#ffffff",
                strokeColor: "#FFA500",
                fillOpacity: .3,
                strokeWeight: 3
            }
        });

        drawingManager.setMap(map);

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
            if (e.type == "marker") {
                alert(e.overlay.getPosition());
            } else {
                $('#exampleModal').modal('show');

                newShape = e.overlay;
                newShape.type = e.type;

                google.maps.event.addListener(newShape, 'click', function() {
                    setSelection(this);
                });
                setSelection(newShape);
            }
        });

        google.maps.event.addListener(map, 'click', function(e) {
            clearSelection();
        });



    }

    function DeleteControl(controlDiv, map) {

        // Set CSS for the control border
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#ffffff';
        controlUI.style.borderStyle = 'solid';
        controlUI.style.borderWidth = '1px';
        controlUI.style.borderColor = '#ccc';
        controlUI.style.height = '24px';
        controlUI.style.marginBottom = '5px';
        controlUI.style.cursor = 'pointer';
        controlUI.style.paddingTop = '3px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Delete area';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior
        var controlText = document.createElement('div');
        controlText.style.fontFamily = 'Arial,sans-serif';
        controlText.style.fontSize = '10px';
        controlText.style.paddingLeft = '4px';
        controlText.style.paddingRight = '4px';
        controlText.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>';
        controlUI.appendChild(controlText);

        // Setup the click event listeners
        google.maps.event.addDomListener(controlUI, 'click', function() {

            if (selectedShape) {
                deleteSelectedShape();
            } else {
                alert("Select area first")
            }
        });
    }

    function SaveControl(controlDiv, map) {

        // Set CSS for the control border
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#ffffff';
        controlUI.style.borderStyle = 'solid';
        controlUI.style.borderWidth = '1px';
        controlUI.style.borderColor = '#ccc';
        controlUI.style.height = '24px';
        controlUI.style.marginBottom = '5px';
        controlUI.style.marginLeft = '-5px';
        controlUI.style.paddingTop = '3px';
        controlUI.style.cursor = 'pointer';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Save area';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior
        var controlText = document.createElement('div');
        controlText.style.fontFamily = 'Arial,sans-serif';
        controlText.style.fontSize = '10px';
        controlText.style.paddingLeft = '4px';
        controlText.style.paddingRight = '4px';
        controlText.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16"><path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/></svg>';
        controlUI.appendChild(controlText);

        // Setup the click event listeners
        google.maps.event.addDomListener(controlUI, 'click', function() {

            if (selectedShape) {
                $('#exampleModal').modal('show');
            } else {
                alert("Select area first")
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function submitFunction() {

        save_coordinates_to_array(newShape);

    }
</script>


@endsection

@section("scripts")
<script>
    
    function getcities(sel){
    let id = sel.value;

 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      
    $.ajax({
        type:'get',
       url: `../getcities/${id}`,
   //    contentType: "application/json; charset=utf-8",
       dataType: "Json",
       success: function(result){
           console.log(result);
       $("#city").empty();
       $("#city").append(result.data);
        $('#city').selectpicker('refresh');
          
         }
    });
    }function getzones(sel){
    let id = sel.value;
 console.log(sel);
 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      
    $.ajax({
        type:'get',
       url: `../getzones/${id}`,
   //    contentType: "application/json; charset=utf-8",
       dataType: "Json",
       success: function(result){
          
       $("#zone").empty();
       $("#zone").html(result.data);
       $('#zone').selectpicker('refresh');
           
         }
    });
    }
</script>
@endsection