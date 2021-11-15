@section('css')
    <link href="{{ asset('assets/css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css" />
@endsection
@extends("layouts.storeindex")
@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                الطلبات
            </div>
        </div>

        <div class="card-body order">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-takeAway-tab" data-toggle="pill" href="#pills-takeAway"
                                role="tab" aria-controls="pills-takeAway" aria-selected="true">تيك اواي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-delivery-tab" data-toggle="pill" href="#pills-delivery"
                                role="tab" aria-controls="pills-delivery" aria-selected="false">دليفري</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                                aria-controls="pills-table" aria-selected="false">طاولة</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-takeAway" role="tabpanel"
                            aria-labelledby="pills-takeAway-tab">
                            <!--begin::Wizard-->
                            <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="step-first"
                                data-wizard-clickable="false">
                                <!--begin::Wizard Nav-->
                                <div class="wizard-nav border-bottom">
                                    <div class="wizard-steps p-8 p-lg-10">
                                        <!--begin::Wizard Step 1 Nav-->
                                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                            <div class="wizard-label">
                                                <!-- <i class="wizard-icon flaticon-bus-stop"></i> -->
                                                <i class="wizard-icon flaticon-list"></i>
                                                <h3 class="wizard-title">1. البيانات الشخصية</h3>
                                            </div>
                                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                            x="11" y="5" width="2" height="14" rx="1" />
                                                        <path
                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Wizard Step 1 Nav-->
                                        <!--begin::Wizard Step 2 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-label">
                                                <i class="wizard-icon flaticon-imac"></i>
                                                <h3 class="wizard-title">2. طلب الاوردر</h3>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 2 Nav-->
                                    </div>
                                </div>
                                <!--end::Wizard Nav-->
                                <!--begin::Wizard Body-->
                                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                    <div class="col-md-12 col-lg-12">
                                        <!--begin::Wizard Form-->
                                        <form class="form" id="kt_form" method="POST"
                                            action="{{ route('storeorder') }}">
                                            @csrf
                                            <!--begin::Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content"
                                                data-wizard-state="current">
                                                <h3 class="mb-10 font-weight-bold text-dark title_wizard">أدخل البيانات
                                                    الشخصية</h3>
                                                <div class="row">
                                                    <!--begin::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>الاسم</label>
                                                            <input type="text" name="name" required
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="الاسم" />
                                                            <span class="form-text text-muted">من فضلك ادخل الاسم</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Input-->
                                                    <!--begin::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>رقم الهاتف</label>
                                                            <input type="number" required name="phone"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="رقم الهاتف" />
                                                            <span class="form-text text-muted">من فضلك ادخل رقم
                                                                الهاتف</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 1-->
                                            <!--begin::Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <h4 class="mb-10 font-weight-bold text-dark title_wizard">اطلب الاوردر</h4>
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-2">
                                                        <div class="nav flex-column nav-pills category_product"
                                                            id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            @foreach ($categories as $category)
                                                                <a class="nav-link @if ($loop->first) active @endif"
                                                                    id="v-pills-home-tab{{ $category->id }}"
                                                                    data-toggle="pill"
                                                                    href="#v-pills-home{{ $category->id }}" role="tab"
                                                                    aria-controls="v-pills-home{{ $category->id }}"
                                                                    aria-selected="true">{{ $category->title }}</a>
                                                            @endforeach
                                                            {{-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" 
                                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">طواجن</a>
                                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" 
                                                        role="tab" aria-controls="v-pills-messages" aria-selected="false">حلويات</a>
                                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">مشروبات</a> --}}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-8">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            @foreach ($categories as $category)
                                                                <div class="tab-pane fade show @if ($loop->first)  active @endif"
                                                                    id="v-pills-home{{ $category->id }}" role="tabpanel"
                                                                    aria-labelledby="v-pills-home-tab{{ $category->id }}">
                                                                    <div class="row">
                                                                        @foreach ($category->products as $product)


                                                                            <!-- card product -->
                                                                            <div class="col-lg-3 col-md-6 col-12">
                                                                                <div class="card card_product">
                                                                                    <img class="card-img-top"
                                                                                        src="{{ asset($product->image) }}"
                                                                                        alt="Card image cap">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">
                                                                                            {{ $product->title }}</h5>
                                                                                        <input type="hidden"
                                                                                            name="product_id[]"
                                                                                            value="{{ $product->id }}">
                                                                                        <div class="number">

                                                                                            <span
                                                                                                class="minus">-</span>

                                                                                            <input type="text"
                                                                                                class="numberProduct"
                                                                                                name="count{{ $product->id }}"
                                                                                                value="0" min="0"
                                                                                                onchange="show({{ $product->id }})" />
                                                                                            <span class="plus"
                                                                                                onclick="">+</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <i class="icon-2x infoicon text-dark flaticon2-information"
                                                                                        onclick="show({{ $product->id }})"></i>
                                                                                </div>
                                                                            </div>
                                                                            <!-- card product -->
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-2">
                                                        @foreach ($categories as $category)
                                                            @foreach ($category->products as $product)
                                                                <div class="showingextra" id="new{{ $product->id }}"
                                                                    style="display: none;">
                                                                    @foreach ($product->extras as $extra)

                                                                        <!-- details product -->
                                                                        <div class="details_order" class="">
                                                                            <h4>
                                                                                {{ $extra->title }}
                                                                            </h4>
                                                                            <input type="hidden" name="extra_id[]"
                                                                                value="{{ $extra->id }}">
                                                                            <div class="form-group">
                                                                                <div class="checkbox-list">
                                                                                    @foreach ($extra->extrasdetails as $extrasdetail)
                                                                                        <label class="checkbox">
                                                                                            <input type="checkbox"
                                                                                                name="extradetail[]"
                                                                                                value="{{ $extrasdetail->id }}" />
                                                                                            <span></span>
                                                                                            {{ $extrasdetail->title }}</label>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- details product -->

                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 2-->
                                            <!--begin::Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button type="button"
                                                        class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                                        data-wizard-type="action-prev">السابق</button>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                        {{-- data-wizard-type="action-submit" --}}>تأكيد</button>
                                                    <button type="button"
                                                        class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                        data-wizard-type="action-next">التالي</button>
                                                </div>
                                                <script>

                                                </script>
                                            </div>
                                            <!--end::Wizard Actions-->
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                                <!--end::Wizard Body-->
                            </div>
                            <!--end::Wizard-->
                        </div>
                        <div class="tab-pane fade" id="pills-delivery" role="tabpanel"
                            aria-labelledby="pills-delivery-tab">
                            <!--begin::Wizard-->
                            <div class="wizard wizard-1" id="kt_wizard1" data-wizard-state="step-first"
                                data-wizard-clickable="false">
                                <!--begin::Wizard Nav-->
                                <div class="wizard-nav border-bottom">
                                    <div class="wizard-steps p-8 p-lg-10">
                                        <!--begin::Wizard Step 1 Nav-->
                                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                            <div class="wizard-label">
                                                <!-- <i class="wizard-icon flaticon-bus-stop"></i> -->
                                                <i class="wizard-icon flaticon-list"></i>
                                                <h3 class="wizard-title">1. البيانات الشخصية</h3>
                                            </div>
                                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                            x="11" y="5" width="2" height="14" rx="1" />
                                                        <path
                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Wizard Step 1 Nav-->
                                        <!--begin::Wizard Step 2 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-label">
                                                <i class="wizard-icon flaticon-imac"></i>
                                                <h3 class="wizard-title">2. طلب الاوردر</h3>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 2 Nav-->
                                    </div>
                                </div>
                                <!--end::Wizard Nav-->
                                <!--begin::Wizard Body-->
                                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                    <div class="col-md-12 col-lg-12">
                                        <!--begin::Wizard Form-->
                                        <form class="form" id="kt_form1" method="POST"
                                            action="{{ route('storeorder2') }}">
                                            @csrf
                                            <!--begin::Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content"
                                                data-wizard-state="current">
                                                <h3 class="mb-10 font-weight-bold text-dark title_wizard">أدخل البيانات
                                                    الشخصية</h3>
                                                <div class="row">
                                                    <!--begin::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>الاسم</label>
                                                            <input type="text" name="name"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="الاسم" />
                                                            <span class="form-text text-muted">من فضلك ادخل الاسم</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Input-->
                                                    <!--begin::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>رقم الهاتف</label>
                                                            <input type="number" name="phone"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="رقم الهاتف" />
                                                            <span class="form-text text-muted">من فضلك ادخل رقم
                                                                الهاتف</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>المنطقة</label>
                                                            <input type="text" name="address_details"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="المنطقة" />
                                                            <span class="form-text text-muted">من فضلك ادخل المنطقة</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <!--begin::Input-->
                                                        {{-- <div class="form-group">
                                                        <label>الشارع</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="الشارع" />
                                                        <span class="form-text text-muted">من فضلك ادخل الشارع</span>
                                                    </div> --}}
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <!--begin::Input-->
                                                        {{-- <div class="form-group">
                                                        <label>الدور</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="الدور" />
                                                        <span class="form-text text-muted">من فضلك ادخل الدور</span>
                                                    </div> --}}
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <!--begin::Input-->
                                                        {{-- <div class="form-group">
                                                        <label>رقم الشقة</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="رقم الشقة" />
                                                        <span class="form-text text-muted">من فضلك ادخل رقم الشقة</span>
                                                    </div> --}}
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 1-->
                                            <!--begin::Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <h4 class="mb-10 font-weight-bold text-dark title_wizard">اطلب الاوردر</h4>
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-2">
                                                        <div class="nav flex-column nav-pills category_product"
                                                            id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            @foreach ($categories as $category)
                                                                <a class="nav-link @if ($loop->first) active @endif"
                                                                    id="v-pills-profile-tab{{ $category->id }}"
                                                                    data-toggle="pill"
                                                                    href="#v-pills-profile{{ $category->id }}" role="tab"
                                                                    aria-controls="v-pills-profile{{ $category->id }}"
                                                                    aria-selected="true">{{ $category->title }}</a>
                                                            @endforeach
                                                            {{-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" 
                role="tab" aria-controls="v-pills-profile" aria-selected="false">طواجن</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" 
                role="tab" aria-controls="v-pills-messages" aria-selected="false">حلويات</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">مشروبات</a> --}}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-8">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            @foreach ($categories as $category)
                                                                <div class="tab-pane fade show @if ($loop->first)  active @endif"
                                                                    id="v-pills-profile{{ $category->id }}" role="tabpanel"
                                                                    aria-labelledby="v-pills-profile-tab{{ $category->id }}">
                                                                    <div class="row">
                                                                        @foreach ($category->products as $product)


                                                                            <!-- card product -->
                                                                            <div class="col-lg-3 col-md-6 col-12">
                                                                                <div class="card card_product">
                                                                                    <img class="card-img-top"
                                                                                        src="{{ asset($product->image) }}"
                                                                                        alt="Card image cap">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">
                                                                                            {{ $product->title }}</h5>
                                                                                        <input type="hidden"
                                                                                            name="product_id[]"
                                                                                            value="{{ $product->id }}">
                                                                                        <div class="number">

                                                                                            <span
                                                                                                class="minus">-</span>

                                                                                            <input type="text"
                                                                                                class="numberProduct"
                                                                                                name="count{{ $product->id }}"
                                                                                                value="0" min="0"
                                                                                                onchange="show2({{ $product->id }})" />
                                                                                            <span class="plus"
                                                                                                onclick="">+</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <i class="icon-2x infoicon text-dark flaticon2-information"
                                                                                        onclick="show2({{ $product->id }})"></i>
                                                                                </div>
                                                                            </div>
                                                                            <!-- card product -->
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-2">
                                                        @foreach ($categories as $category)
                                                            @foreach ($category->products as $product)
                                                                <div class="showingextras" id="news{{ $product->id }}"
                                                                    style="display: none;">
                                                                    @foreach ($product->extras as $extra)

                                                                        <!-- details product -->
                                                                        <div class="details_order"
                                                                            class="">
                                                                            <h4>
                                                                                {{ $extra->title }}
                                                                            </h4>
                                                                            <input type="hidden" name="extra_id[]"
                                                                                value="{{ $extra->id }}">
                                                                            <div class="form-group">
                                                                                <div class="checkbox-list">
                                                                                    @foreach ($extra->extrasdetails as $extrasdetail)
                                                                                        <label class="checkbox">
                                                                                            <input type="checkbox"
                                                                                                name="extradetail[]"
                                                                                                value="{{ $extrasdetail->id }}" />
                                                                                            <span></span>
                                                                                            {{ $extrasdetail->title }}</label>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- details product -->

                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 2-->
                                            <!--begin::Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button type="button"
                                                        class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                                        data-wizard-type="action-prev">السابق</button>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                        {{-- data-wizard-type="action-submit" --}}>تأكيد</button>
                                                    <button type="button"
                                                        class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                        data-wizard-type="action-next">التالي</button>
                                                </div>
                                                <script>

                                                </script>
                                            </div>
                                            <!--end::Wizard Actions-->
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                                <!--end::Wizard Body-->
                            </div>
                            <!--end::Wizard-->
                        </div>
                        <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab">
                            <!--begin::Wizard-->
                            <div class="wizard wizard-1" id="kt_wizard2" data-wizard-state="step-first"
                                data-wizard-clickable="false">
                                <!--begin::Wizard Nav-->
                                <div class="wizard-nav border-bottom">
                                    <div class="wizard-steps p-8 p-lg-10">
                                        <!--begin::Wizard Step 1 Nav-->
                                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                            <div class="wizard-label">
                                                <!-- <i class="wizard-icon flaticon-bus-stop"></i> -->
                                                <i class="wizard-icon flaticon-list"></i>
                                                <h3 class="wizard-title">1. البيانات الشخصية</h3>
                                            </div>
                                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                            x="11" y="5" width="2" height="14" rx="1" />
                                                        <path
                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Wizard Step 1 Nav-->
                                        <!--begin::Wizard Step 2 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-label">
                                                <i class="wizard-icon flaticon-imac"></i>
                                                <h3 class="wizard-title">2. طلب الاوردر</h3>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 2 Nav-->
                                    </div>
                                </div>
                                <!--end::Wizard Nav-->
                                <!--begin::Wizard Body-->
                                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                    <div class="col-md-12 col-lg-12">

                                        <!--begin::Wizard Form-->
                                        <form class="form" id="kt_form2" method="POST"
                                            action="{{ route('storeorder') }}">
                                            @csrf
                                            <!--begin::Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content"
                                                data-wizard-state="current">
                                                <h3 class="mb-10 font-weight-bold text-dark title_wizard">أدخل البيانات
                                                    الشخصية</h3>
                                                <div class="row">
                                                    <!--begin::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>الاسم</label>
                                                            <input type="text" name="name" required
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="الاسم" />
                                                            <span class="form-text text-muted">من فضلك ادخل الاسم</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Input-->
                                                    <!--begin::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>رقم الهاتف</label>
                                                            <input type="number" required name="phone"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="رقم الهاتف" />
                                                            <span class="form-text text-muted">من فضلك ادخل رقم
                                                                الهاتف</span>
                                                        </div>
                                                    </div>
                                                    <!--begin::Input-->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>رقم الطاوله</label>
                                                            <input type="number" required name="table_number"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="رقم الطاوله" />
                                                            <span class="form-text text-muted">من فضلك ادخل رقم
                                                                الطاوله</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 1-->
                                            <!--begin::Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <h4 class="mb-10 font-weight-bold text-dark title_wizard">اطلب الاوردر</h4>
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-2">
                                                        <div class="nav flex-column nav-pills category_product"
                                                            id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            @foreach ($categories as $category)
                                                                <a class="nav-link @if ($loop->first) active @endif"
                                                                    id="v-pills-home-tab{{ $category->id }}"
                                                                    data-toggle="pill"
                                                                    href="#v-pills-home{{ $category->id }}" role="tab"
                                                                    aria-controls="v-pills-home{{ $category->id }}"
                                                                    aria-selected="true">{{ $category->title }}</a>
                                                            @endforeach
                                                            {{-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" 
                                                    role="tab" aria-controls="v-pills-profile" aria-selected="false">طواجن</a>
                                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" 
                                                    role="tab" aria-controls="v-pills-messages" aria-selected="false">حلويات</a>
                                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">مشروبات</a> --}}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-8">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            @foreach ($categories as $category)
                                                                <div class="tab-pane fade show @if ($loop->first)  active @endif"
                                                                    id="v-pills-home{{ $category->id }}" role="tabpanel"
                                                                    aria-labelledby="v-pills-home-tab{{ $category->id }}">
                                                                    <div class="row">
                                                                        @foreach ($category->products as $product)


                                                                            <!-- card product -->
                                                                            <div class="col-lg-3 col-md-6 col-12">
                                                                                <div class="card card_product">
                                                                                    <img class="card-img-top"
                                                                                        src="{{ asset($product->image) }}"
                                                                                        alt="Card image cap">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">
                                                                                            {{ $product->title }}</h5>
                                                                                        <input type="hidden"
                                                                                            name="product_id[]"
                                                                                            value="{{ $product->id }}">
                                                                                        <div class="number">

                                                                                            <span
                                                                                                class="minus">-</span>

                                                                                            <input type="text"
                                                                                                class="numberProduct"
                                                                                                name="count{{ $product->id }}"
                                                                                                value="0" min="0"
                                                                                                onchange="show({{ $product->id }})" />
                                                                                            <span class="plus"
                                                                                                onclick="">+</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <i class="icon-2x infoicon text-dark flaticon2-information"
                                                                                        onclick="show({{ $product->id }})"></i>
                                                                                </div>
                                                                            </div>
                                                                            <!-- card product -->
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-2">
                                                        @foreach ($categories as $category)
                                                            @foreach ($category->products as $product)
                                                                <div class="showingextra" id="new{{ $product->id }}"
                                                                    style="display: none;">
                                                                    @foreach ($product->extras as $extra)

                                                                        <!-- details product -->
                                                                        <div class="details_order"
                                                                            class="">
                                                                            <h4>
                                                                                {{ $extra->title }}
                                                                            </h4>
                                                                            <input type="hidden" name="extra_id[]"
                                                                                value="{{ $extra->id }}">
                                                                            <div class="form-group">
                                                                                <div class="checkbox-list">
                                                                                    @foreach ($extra->extrasdetails as $extrasdetail)
                                                                                        <label class="checkbox">
                                                                                            <input type="checkbox"
                                                                                                name="extradetail[]"
                                                                                                value="{{ $extrasdetail->id }}" />
                                                                                            <span></span>
                                                                                            {{ $extrasdetail->title }}</label>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- details product -->

                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 2-->
                                            <!--begin::Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button type="button"
                                                        class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                                        data-wizard-type="action-prev">السابق</button>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                        {{-- data-wizard-type="action-submit" --}}>تأكيد</button>
                                                    <button type="button"
                                                        class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                        data-wizard-type="action-next">التالي</button>
                                                </div>
                                                <script>

                                                </script>
                                            </div>
                                            <!--end::Wizard Actions-->
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                                <!--end::Wizard Body-->
                            </div>
                            <!--end::Wizard-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/custom/wizard/takeaway_wizard.js') }}"></script>
    <script src="{{ asset('assets/js/pages/custom/wizard/delivery_wizard.js') }}"></script>
    <script src="{{ asset('assets/js/pages/custom/wizard/table_wizard.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.minus').click(function() {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 0 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function() {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });

        function show(id) {
            $('.showingextra').hide(); //css("display","none");
            $(`#new${id}`).show();
            // console.log("assaas");
        }

        function show2(id) {
            $('.showingextras').hide(); //css("display","none");
            $(`#news${id}`).show();
            // console.log("assaas");
        }
    </script>
@endsection
