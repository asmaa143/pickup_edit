@extends("layouts.adminindex")
@section("content")
<form action="{{route('cities.store')}}" method="post">
    @csrf
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
              {{__('messages.addcity')}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            {{__('messages.state')}}
                            <!-- <span class="text-danger">AR</span> -->
                        </label>
                        <select class="form-control selectpicker" name="state_id"  data-live-search="true">
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->title}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div> 
            </div>
            <div class="row">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.title_'.$localeCode) }} 
                            <span class="text-danger"> ( {{ $localeCode }} )</span>
                        </label>
                        <input type="text" class="form-control  @error('title-' . $localeCode)
                         is-invalid @enderror" name="title-{{ $localeCode }}"
                         value="{{ old('title-' . $localeCode) }}"
                         placeholder="{{ __('messages.city_'.$localeCode) }}" />
                         @error('title-' . $localeCode) <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>
                @endforeach

             
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
        </div>
    </div>
</form>
@endsection