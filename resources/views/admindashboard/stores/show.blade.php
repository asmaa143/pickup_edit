@extends("layouts.adminindex")
@section("content")
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <!--begin::Details-->
                <div class="d-flex mb-9">
                    <!--begin: Pic-->
                    <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                        <div class="symbol symbol-50 symbol-lg-120">
                            <img src="{{asset($store->logo)}}" alt="image" />
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between flex-wrap mt-1">
                            <div class="d-flex mr-3">
                                <span class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3"> {{$store->name}}</span>
                            </div>
                        </div>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <div class="d-flex flex-wrap justify-content-between mt-1">
                            <div class="d-flex flex-column flex-grow-1 pr-8">
                                <div class="d-flex flex-wrap mb-4">
                                    <a href="mailto:info@pickup.com" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="far fa-envelope mr-2 font-size-lg"></i>
                                        {{$store->email}}
                                    </a>
                                    <a href="tel:01111488849" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="fas fa-phone mr-2 font-size-lg"></i>
                                        {{$store->phone}}
                                    </a>
                                    <a href="https://goo.gl/maps/dCkSFDu2pWF9tLEeA" target="_blank" class="text-dark-50 text-hover-primary font-weight-bold">
                                        <i class="fas fa-map-marker-alt mr-2 font-size-lg"></i>
                                           {{$store->state->title}} - {{$store->city->title}} - {{$store->zone->title}}
                                    </a>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="type_restaurant">
                                        <h3> {{__('messages.storetype')}}</h3>
                                        <ul>
                                           
                                            <li>{{$store->major->title}} </li>
                                        </ul>
                                    </div>
                                    <div class="lang">
                                        <h3>{{__('messages.language')}}</h3>
                                        <ul>
                                            @foreach($store->languages as $lang)
                                            <li>{{$lang->lang}}</li>
                                        
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-25 flex-fill">
                                <ul class="administrator">
                                    <li>
                                        <label for="">{{__('messages.responsible_name')}}  : </label>
                                        <span> {{$store->responsible_name}}</span>
                                    </li>
                                    <li>
                                    <label for="">{{__('messages.responsible_phone')}}  : </label>
                                        <span> {{$store->responsible_phone}}</span>
                                    </li>
                                    <li>
                                         <label for="">{{__('messages.cr_no')}}  : </label>
                                        <span> {{$store->cr_no}}</span>
                                    </li>
                                    <li>
                                    <label for="">{{__('messages.tax_number')}}  : </label>
                                        <span> {{$store->tax_number}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                <div class="separator separator-solid"></div>
                <!--begin::Items-->
                <div class="d-flex align-items-center flex-wrap mt-8">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column flex-lg-fill">
                            <span class="text-dark-75 font-weight-bolder font-size-sm">{{__('messages.download')}}</span>
                            <a href="{{asset($store->contract_image)}}" download class="text-primary font-weight-bolder">{{__('messages.contract_image')}}</a>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Items-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column flex-lg-fill">
                            <span class="text-dark-75 font-weight-bolder font-size-sm">{{__('messages.download')}}</span>
                            <a href="{{asset($store->logo)}}" download class="text-primary font-weight-bolder"
                                >{{__('messages.logo')}}</a>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection