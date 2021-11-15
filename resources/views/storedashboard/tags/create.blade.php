@extends("layouts.storeindex")
@section("content")
<form action="{{route('tags.store')}}" method="post" enctype="multipart/form-data" class="avatar-upload">
@csrf
<!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('messages.addtag')}} 
            </div>
        </div>
        <div class="card-body">
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
                         placeholder="{{ __('messages.tag_'.$lang->lang) }}" />
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