@extends("layouts.storeindex")
@section("content")
<form action="{{route('drivers.update',$driver->id)}}"  method ="post" enctype="multipart/form-data" class="avatar-upload">
    @csrf
    @method("PUT")
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__("messages.editdriver")}}
            </div>
        </div>
        <div class="card-body">
         
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.name')}}
                        </label>
                        <input type="text" name="name" value="{{$driver->name}}" class="form-control"
                         placeholder="{{__('messages.name')}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.email')}}
                        </label>
                        <input type="email" name="email" value="{{$driver->email}}" class="form-control"
                         placeholder="{{__('messages.email')}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.phone')}}
                        </label>
                        <input type="number" name="phone" value="{{$driver->phone}}" class="form-control" placeholder="{{__('messages.phone')}}">
                    </div>
                </div><div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__("messages.branches")}}
                        </label>
                        <select data-live-search="true" data-live-search-style="startsWith" name="branch_id"
                        class="form-control selectpicker" >
                        @foreach($branches as $branch)
                            <option value='{{$branch->id}}' @if($driver->branch_id == $branch->id) 
                                selected @endif>>{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__("messages.workshift")}}
                        </label>
                        <select data-live-search="true" data-live-search-style="startsWith" name="workshift_id"
                        class="form-control selectpicker" >
                        @foreach($workshifts as $workshift)
                            <option value='{{$workshift->id}}' @if($driver->workshift_id == $workshift->id) 
                                selected @endif>>{{$workshift->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.password')}}
                        </label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" 
                        placeholder="{{__('messages.password')}}">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
            </div>
        </div>
</form>
<script src="https://maps.googleapis.com/maps/api/js"></script>
@endsection