@extends("layouts.storeindex")
@section("content")
<form action="{{route('zonesstore.update',$zone->id)}}" method="post">
    @csrf
    @method("PUT")
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
             {{__('messages.editzone')}}
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            {{__('messages.state')}}
                            <!-- <span class="text-danger">AR</span> -->
                        </label>
                        <select class="form-control selectpicker" name="state_id" onchange="getcities(this)" data-live-search="true">
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->title}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            {{__('messages.city')}}
                            <!-- <span class="text-danger">AR</span> -->
                        </label>
                        <select class="form-control selectpicker" name="city_id" id="city" data-live-search="true">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->title}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div>
                </div>

                <div class="row">
                    @foreach($store->languages as $lang)
                    <!-- For loop this div -->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                            {{ __('messages.title_'.$lang->lang) }} 
                                <span class="text-danger"> ( {{ $lang->lang }} )</span>
                            </label>
                            <input type="text" class="form-control
                              @error('title-' . $lang->lang) is-invalid @enderror" name="title-{{ $lang->lang }}" required
                             value="{{ $zone->translate($lang->lang)->title}}"
                             placeholder="{{ __('messages.zone_'.$lang->lang) }}" />
                             @error('title-' . $lang->lang) <span class="invalid-feedback">
                    {{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endforeach

             
            </div>
            </div>
<input type="hidden" id="points" name="points">
            <div class="right_col" role="main">
                <div class="search"></div>
                <div class="row">
                    <div id="map"></div>
                    <div class="container" id="advanced-search-form">

                        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="needs-validation" novalidate role="form" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="radus2" name="radus" class="loginText" value="" />
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="waiting">{{__('messages.waiting')}}</label>
                                    <input name="waiting" min="0" type="number" class="form-control" id="waiting" placeholder="{{__('messages.waiting')}}" required>
                                    <div class="invalid-tooltip">
                                        {{__('messages.PleaseEntervalid')}} {{__('messages.waiting')}}
                                    </div>

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="Kilometercost">{{__('messages.Kilometercost')}}</label>
                                    <input name="Kilometercost" min="0" type="number" class="form-control" id="Kilometercost" placeholder="{{__('messages.Kilometercost')}}/({{__('messages.Pound')}}/{{__('messages.Km')}})" required>
                                    <div class="invalid-tooltip">
                                        {{__('messages.PleaseEntervalid')}} {{__('messages.Kilometercost')}}

                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="countcounter">{{__('messages.countcounter')}}</label>
                                    <input name="countcounter" min="0" type="number" class="form-control" id="countcounter" placeholder="{{__('messages.countcounter')}}" required>
                                    <div class="invalid-tooltip">
                                        {{__('messages.PleaseEntervalid')}} {{__('messages.countcounter')}}
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="placename">{{__('messages.placename')}}</label>
                                    <input name="placename" min="0" type="text" class="form-control placename" id="placename" placeholder="{{__('messages.placename')}}" required>
                                    <div class="invalid-tooltip">
                                        {{__('messages.PleaseEntervalid')}} {{__('messages.placename')}}
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="percentdelivery">{{__('messages.percentdelivery')}}</label>
                                    <input name="percentdelivery" min="0" type="text" class="form-control " id="percentdelivery" placeholder="{{__('messages.percentdelivery')}}" required>
                                    <div class="invalid-tooltip">
                                        {{__('messages.PleaseEntervalid')}} {{__('messages.percentdelivery')}}
                                    </div>
                                </div>

                            </div>

                        </form>
                        {{-- <button class="btn btn-primary submab" onclick="submitFunction()" >{{__('messages.submit')}}</button>
                        --}}
                        <input name="save" type="button" value="Save" onClick="submitFunction()">
                    </div>
                </div>
            </div> -->

                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
                {{__("messgaes.save")}}</button>
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
    var ehaab;
</script>

<script>
    function draw_shape() {
        var areas = <?php
                                        echo $zone;
                                        
                            ?>

        // for (var j = 0; j < areas.length; j++) {
             var latlngs = areas.text;
           const latlngsObj = JSON.parse(latlngs);
            const bermudaTriangle = new google.maps.Polygon({
                paths: latlngsObj,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
                area: areas
            });
            google.maps.event.addListener(bermudaTriangle, 'click', function() {
                var area = this.area;
                setSavedAreaSelectionSelection(area, this);
            });
            bermudaTriangle.setMap(map);
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
                        // $('#exampleModalDele' + id).modal('hide');
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
        console.log("SAsa");
        coordinates.push(fPoint);
        //alert('points '+JSON.stringify(coordinates));
        var points = JSON.stringify(coordinates);
        $("#points").val(points);
        var waiting = document.getElementById("waiting").value;
        var Kilometercost = document.getElementById("Kilometercost").value;
        var countcounter = document.getElementById("countcounter").value;
        var placename = document.getElementById("placename").value;
        var percentdelivery = document.getElementById("percentdelivery").value;

        // $.ajax({
        //     type: "GET",
        //     url: "{{url('ciadmin/maps/store')}}",
        //     contentType: "application/json; charset=utf-8",
        //     dataType: "Json",
        //     data: {
        //         points: points,
        //         waiting: waiting,
        //         Kilometercost: Kilometercost,
        //         countcounter: countcounter,
        //         placename: placename,
        //         percentdelivery: percentdelivery,
        //     },
        //     success: function(result) {

        //         if (result == 1) {
        //             Swal.fire({
        //                 position: 'top-start',
        //                 icon: 'success',
        //                 title: 'تم الاضافه ',
        //                 showConfirmButton: false,
        //                 timer: 2000
        //             })

        //         } else {
        //             Swal.fire({
        //                 position: 'top-start',
        //                 icon: 'success',
        //                 title: '  تمت الاضافه من قبل ',
        //                 showConfirmButton: false,
        //                 timer: 2000
        //             })
        //         }
        //         setTimeout(function() { // wait for 5 secs(2)
        //             location.reload(); // then reload the page.(3)
        //         });
        //     }
        // });

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
             

                newShape = e.overlay;
                newShape.type = e.type;

                google.maps.event.addListener(newShape, 'click', function() {
                    setSelection(this);
                });
                setSelection(newShape);
           
                var polygonBounds = newShape.getPath();

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
console.log("SAsa");
coordinates.push(fPoint);
//alert('points '+JSON.stringify(coordinates));
var points = JSON.stringify(coordinates);
$("#points").val(points);
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
            
            } else {
                alert("Select area first")
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function submitFunction() {

        save_coordinates_to_array(newShape);

    }
    function getcities(sel){
    let id = sel.value;
 console.log(sel);
 var table = $('.dataTable').DataTable();
 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      
    $.ajax({
        type:'get',
       url: `../../getstorecities/${id}`,
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
</script>
@endsection