@extends("layouts.storeindex")
@section("content")
<form action="{{route('workshifts.store')}}" method="post" enctype="multipart/form-data" class="avatar-upload">
    @csrf
<div class="container">
    <!-- begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
               {{__("addworkshift")}}
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
                         placeholder="{{ __('messages.title_'.$lang->lang) }}" />
                         @error('title-' . $lang->lang) <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>
                @endforeach
                <!-- For loop this div -->
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">{{__("messages.fromtime")}}</label>
                        <input type="time" name="fromtime" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">{{__("messages.totime")}}</label>
                        <input type="time" name="totime"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
                {{__('messages.save')}} 
                </button>
            </div>
        </div>
        
    </div>
    <!-- end::Card-->
</div>
</form>
@endsection