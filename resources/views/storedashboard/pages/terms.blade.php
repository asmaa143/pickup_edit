@extends("layouts.storeindex")
@section("content")
<form action="{{route('editterms')}}"  enctype="multipart/form-data" 
    method="post">
@csrf
@method("PUT")
<!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('messages.terms')}} 
            </div>
        </div>
        <div class="card-body">
    
            <div class="row">
       
             
              @foreach($store->languages as $lang)
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.text_'.$lang->lang) }} 
                            <span class="text-danger"> ( {{ $lang->lang }} )</span>
                        </label>
                        <textarea name="text-{{ $lang->lang }}"  class="form-control
                        @error('text-' . $lang->lang) is-invalid @enderror" rows="6">{{$text->translate($lang->lang)->text ?? ''}}</textarea>
                        @error('text-' . $lang->lang) <span class="invalid-feedback">
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