@extends("layouts.adminindex")
@section("content")
<form action="{{route('states.store')}}" method="post">
@csrf
<!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('messages.addstate')}} 
            </div>
        </div>

        <div class="card-body">
            <div class="row">
       
              @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.title_'.$localeCode) }} 
                            <span class="text-danger"> ( {{ $localeCode }} )</span>
                        </label>
                        <input type="text" class="form-control  @error('title-' . $localeCode) is-invalid @enderror" name="title-{{ $localeCode }}"
                         value="{{ old('title-' . $localeCode) }}"
                         placeholder="{{ __('messages.state_'.$localeCode) }}" />
                         @error('title-' . $localeCode) <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>
                @endforeach
                <!-- For loop this div -->

                <!-- For loop this div -->
                <!-- <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            المحافظة
                            <span class="text-danger">EN</span>
                        </label>
                        <input type="text" class="form-control" placeholder="المحافظة" />
                    </div>
                </div> -->
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