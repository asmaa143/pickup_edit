@extends("layouts.storeindex")
@section("content")
<form action="{{route('drivers.store')}}"  method ="post" enctype="multipart/form-data" class="avatar-upload">
    @csrf
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__("messages.adddriver")}}
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.name')}}
                        </label>
                        <input type="text" name="name" value="{{old('name')}}" required class="form-control"
                         placeholder="{{__('messages.name')}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.email')}}
                        </label>
                        <input type="email" name="email" value="{{old('email')}}"  required class="form-control
                         @error('email') is-invalid @enderror"
                         placeholder="{{__('messages.email')}}">
                         @error('email') <span class="invalid-feedback">
                            {{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.password')}}
                        </label>
                        <input type="password" name="password" value="{{old('password')}}" required class="form-control"
                        placeholder="{{__('messages.password')}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__('messages.phone')}}
                        </label>
                        <input type="number" name="phone" value="{{old('phone')}}"
                        class="form-control  @error('phone') is-invalid @enderror"  required placeholder="{{__('messages.phone')}}">
                        @error('phone') <span class="invalid-feedback">
                            {{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__("messages.branches")}}
                        </label>
                        <select data-live-search="true" data-live-search-style="startsWith" name="branch_id"
                        class="form-control selectpicker" >
                        @foreach($branches as $branch)
                            <option value='{{$branch->id}}'>{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__("messages.workshift")}}
                        </label>
                        <select data-live-search="true" data-live-search-style="startsWith" name="workshift_id"
                        class="form-control selectpicker" >
                        @foreach($workshifts as $workshift)
                            <option value='{{$workshift->id}}'>{{$workshift->title}}</option>
                            @endforeach
                        </select>
                    </div>
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
