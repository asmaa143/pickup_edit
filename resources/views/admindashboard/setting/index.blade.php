@extends("layouts.adminindex")
@section("content")

<!--begin::Card-->
<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
     {{__('messages.addlink')}}
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('savesetting')}}">
            @csrf
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="">{{__('messages.link')}}</label>
              <input type="url" name="serverurl" id="serverurl"  value="{{$setting->serverurl}}" class="form-control" placeholder="{{__('messages.link')}}">
            </div>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">{{__("messages.save")</button>
    </div>
    </form>
</div>
@endsection