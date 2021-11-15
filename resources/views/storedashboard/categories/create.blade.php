@extends("layouts.storeindex")
@section("content")
<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data" class="avatar-upload">
@csrf
<!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('messages.addcategory')}} 
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
                        <div id="imagePreview">
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
                         value="{{ old('title-' . $lang->lang) }}"
                         placeholder="{{ __('messages.category_'.$lang->lang) }}" />
                         @error('title-' . $lang->lang) <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>
                @endforeach
                <!-- For loop this div -->

            
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