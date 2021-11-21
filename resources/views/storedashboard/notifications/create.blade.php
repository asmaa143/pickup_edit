@extends("layouts.storeindex")
@section("content")
<form action="{{route('notifications.store')}}" method="post" enctype="multipart/form-data" class="avatar-upload">
@csrf
<!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('messages.addnotification')}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">

                <!-- For loop this div -->
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.title') }}
                            {{-- <span class="text-danger"> ( {{ $lang->lang }} )</span> --}}
                        </label>
                        <input type="text" class="form-control
                          @error('title') is-invalid @enderror"
                          name="title" required
                         value="{{ old('title') }}"
                         placeholder="{{ __('messages.title') }}" />
                         @error('title') <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- For loop this div -->
                <div class="col-md-8">
                    <div class="form-group">
                        <label>{{__('messages.text')}}</label>
                        <textarea name="text" rows="4" class="form-control
                        @error('text') is-invalid @enderror" >{{ old('text') }}</textarea>
                    </div>
                </div>
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
