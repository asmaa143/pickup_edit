@extends("layouts.storeindex")
@section("content")
<form action="{{route('coupons.store')}}" enctype="multipart/form-data" method="POST" class="avatar-upload">
    @csrf
<div class="container">
    <!-- begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                {{__("messages.addcoupon")}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="">{{__('messages.code')}} </label>
                        <input type="text" class="form-control" required name="code" placeholder="{{__('messages.code')}} ">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="">{{__('messages.value')}}</label>
                        <input type="number" class="form-control"required name="value" placeholder="{{__('messages.value')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="">{{__("messages.valuetype")}} </label>
                        <select class="form-control selectpicker" name="is_percentage"
                         title="{{__('messages.valuetype')}} ">
                            <option value="1">{{__("percentage")}}</option>
                            <option value="0">{{__("fixed")}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for=""> {{__("messages.end_date")}}</label>
                        <input type="date" class="form-control" required name="end_date" value="{{old('end_date')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="">{{__('messages.maximum')}}</label>
                        <input type="number" class="form-control"required name="maximum" placeholder="{{__('messages.maximum')}}">
                    </div>
                </div> <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <label for="">{{__('messages.minimum')}}</label>
                        <input type="number" class="form-control" required name="minimum" placeholder="{{__('messages.minimum')}}">
                    </div>
                </div>
                {{-- <div class="col-12">
                    <label> {{__("messages.coupon active")}}</label>
                    <div class="col-3">
                        <span class="switch switch-outline switch-icon switch-primary">
                            <label>
                                <input type="checkbox" checked name="active" value="1"/>
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
                {{__("messages.save")}}</button>
        </div>
    </div>
    <!-- end::Card-->
</div>
</form>
@endsection