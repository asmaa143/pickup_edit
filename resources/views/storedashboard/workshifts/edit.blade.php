@extends("layouts.storeindex")
@section('content')
    <form action="{{ route('workshifts.update', $workshift->id) }}" method="post" enctype="multipart/form-data" class="avatar-upload">
        @csrf
        @method("PUT")
        <!-- begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    {{ __('addworkshift') }}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($store->languages as $lang)
                        <!-- For loop this div -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>
                                    {{ __('messages.title_' . $lang->lang) }}
                                    <span class="text-danger"> ( {{ $lang->lang }} )</span>
                                </label>
                                <input type="text" class="form-control
                          @error('title-' . $lang->lang) is-invalid @enderror" name="title-{{ $lang->lang }}" required value="{{ $workshift->translate($lang->lang)->title }}" placeholder="{{ __('messages.title_' . $lang->lang) }}" />
                                @error('title-' . $lang->lang) <span class="invalid-feedback">
                                    {{ $message }}</span> @enderror
                            </div>
                        </div>
                    @endforeach
                    <!-- For loop this div -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">{{ __('messages.fromtime') }}</label>
                            <input type="time" name="fromtime" value="{{ $workshift->fromtime }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">{{ __('messages.totime') }}</label>
                            <input type="time" name="totime" value="{{ $workshift->totime }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
                    {{ __('messages.save') }}
                </button>
            </div>
        </div>
        <!-- end::Card-->
    </form>
@endsection
