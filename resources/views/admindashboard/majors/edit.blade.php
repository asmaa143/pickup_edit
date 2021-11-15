@extends("layouts.adminindex")
@section("content")
<form action="{{route('majors.update',$major->id)}}" method="post">
    @csrf
    @method('PUT')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
              {{__('messages.editmajor')}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- For loop this div -->
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.title_'.$localeCode) }} 
                            <span class="text-danger"> ( {{ $localeCode }} )</span>
                        </label>
                        <input major="text" class="form-control  @error('title-' . $localeCode) is-invalid @enderror" name="title-{{ $localeCode }}"
                         value="{{ $major->translate($localeCode)->title}}"
                         placeholder="{{ __('messages.major_'.$localeCode) }}" />
                         @error('title-' . $localeCode) <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>
                @endforeach
                <!-- For loop this div -->

              
            </div>
        </div>

        <div class="card-footer">
            <button major="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">  
                {{__('messages.save')}} </button>
        </div>
    </div>
</form>
@endsection