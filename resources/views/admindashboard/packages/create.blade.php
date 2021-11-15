@extends("layouts.adminindex")
@section("content")
<form action="{{route('packages.index')}}">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                أضافة باقة
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <!-- card name for loop -->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                اسم الباقة
                                <span class="text-danger">AR</span>
                            </label>
                            <input type="text" class="form-control" placeholder="اسم الباقة" />
                        </div>
                    </div>
                    <!-- card name for loop -->

                    <!-- card name for loop -->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                اسم الباقة
                                <span class="text-danger">EN</span>
                            </label>
                            <input type="text" class="form-control" placeholder="اسم الباقة" />
                        </div>
                    </div>
                    <!-- card name for loop -->
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                المميزات
                            </label>
                            <select class="form-control select2" placeholder="sssss" aria-placeholder="555" id="kt_select2_3" name="param" multiple="multiple" data-max-options="3">
                                <optgroup data-max-options="1" label="المستخدمين">
                                    <option title="المستخدمين" value="1" name="a" selected="selected">مستخدم واحد</option>
                                    <option title="المستخدمين" value="2" name="a">مستخدمين</option>
                                    <option title="المستخدمين" value="3" name="a">ثلاثة مستخدمين</option>
                                </optgroup>
                                <optgroup data-max-options="1" label="محفظة">
                                    <option title="محفظة" value="test1">تيست</option>
                                    <option title="محفظة" value="test1" selected="selected">تيست</option>
                                </optgroup>
                                <optgroup data-max-options="1" label="سيرفر">
                                    <option title="سيرفر" value="CO">Single</option>
                                    <option title="سيرفر" value="CO">Premium</option>
                                    <option title="سيرفر" value="CO">Business</option>
                                    <option title="سيرفر" value="aws" selected="selected">سيرفر AWS</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- loop for duration & price -->
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                المدة
                            </label>
                            <select class="form-control selectpicker" title="المدة">
                                <option>شهر</option>
                                <option>3 شهور</option>
                                <option>6 شهور</option>
                                <option>12 شهور</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                السعر
                            </label>
                            <input type="text" class="form-control" placeholder="السعر" />
                        </div>
                    </div>
                </div>
                <!-- loop for duration & price -->

                <!-- loop for duration & price -->
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                المدة
                            </label>
                            <select class="form-control selectpicker" title="المدة">
                                <option>شهر</option>
                                <option>3 شهور</option>
                                <option>6 شهور</option>
                                <option>12 شهور</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                السعر
                            </label>
                            <input type="text" class="form-control" placeholder="السعر" />
                        </div>
                    </div>
                </div>
                <!-- loop for duration & price -->

                <!-- loop for duration & price -->
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                المدة
                            </label>
                            <select class="form-control selectpicker" title="المدة">
                                <option>شهر</option>
                                <option>3 شهور</option>
                                <option>6 شهور</option>
                                <option>12 شهور</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                السعر
                            </label>
                            <input type="text" class="form-control" placeholder="السعر" />
                        </div>
                    </div>
                </div>
                <!-- loop for duration & price -->

                <!-- loop for duration & price -->
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                المدة
                            </label>
                            <select class="form-control selectpicker" title="المدة">
                                <option>شهر</option>
                                <option>3 شهور</option>
                                <option>6 شهور</option>
                                <option>12 شهور</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                السعر
                            </label>
                            <input type="text" class="form-control" placeholder="السعر" />
                        </div>
                    </div>
                </div>
                <!-- loop for duration & price -->

            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
@endsection