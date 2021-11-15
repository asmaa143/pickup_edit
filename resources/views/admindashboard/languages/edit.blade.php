@extends("layouts.storeindex")
@section("content")
<form action="{{route('updatelanguage',['locale'=>$locale])}}"  enctype="multipart/form-data" method="post" class="avatar-upload">
@csrf
@method("post")
<!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('messages.editlanguage')}} 
            </div>
        </div>
        <div class="card-body">
        <div class="row">
                <!-- ============= Upload image ============= -->
                <div class="upload_img">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"
                         name="image"  />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview container2">
                        <div id="imagePreview" style="background-image:url({{asset($language->image ?? '')}})">
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
         
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
            {{__('messages.save')}} 
            </button>
        </div>
    </div>
</form>
@endsection