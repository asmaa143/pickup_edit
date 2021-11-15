@extends("layouts.adminindex")
@section("content")

<form action="{{route('features.index')}}">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                تعديل ميزة
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <!-- For loop this Lang -->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                اسم الميزة
                                <span class="text-danger">AR</span>
                            </label>
                            <input type="text" class="form-control" placeholder="اسم الميزة" />
                        </div>
                    </div>
                    <!-- For loop this Lang -->

                    <!-- For loop this Lang -->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                اسم الميزة
                                <span class="text-danger">EN</span>
                            </label>
                            <input type="text" class="form-control" placeholder="اسم الميزة" />
                        </div>
                    </div>
                    <!-- For loop this Lang -->
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                نوع الميزة
                            </label>
                            <select class="form-control selectpicker" title="نوع الميزة">
                                <option>المنصورة</option>
                                <option>المحلة</option>
                                <option>طنطا</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                السعر
                            </label>
                            <input type="number" class="form-control" placeholder="السعر" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                العدد
                            </label>
                            <input type="number" class="form-control" placeholder="العدد" />
                        </div>
                    </div>
                </div>
                <div id="kt_repeater_1">
                    <div class="form-group">
                        <div class="row">
                            <div data-repeater-list="" class="col-lg-12">
                                <label>
                                    شرح الميزة
                                </label>
                                <!-- for loop this lang -->
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <!-- for loop this description features -->
                                    <div class="col-5">
                                        <label>
                                            <span class="text-danger">AR</span>
                                        </label>
                                        <input type="email" class="form-control" placeholder="شرح الميزة" />
                                    </div>
                                    <!-- for loop this description features -->

                                    <!-- for loop this description features -->
                                    <div class="col-5">
                                        <label>
                                            <span class="text-danger">EN</span>
                                        </label>
                                        <input type="email" class="form-control" placeholder="شرح الميزة" />
                                    </div>
                                    <!-- for loop this description features -->
                                    <div class="col-2">
                                        <label for="" class="nonelabel">delete</label>
                                        <a href="javascript:;" data-repeater-delete="" class="btn d-block btn-sm font-weight-bolder btn-light-danger">
                                            <i class="la la-trash-o"></i>Delete</a>
                                    </div>
                                </div>
                                <!-- for loop this lang -->
                            </div>
                            <div class="col-12">
                                <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                    <i class="la la-plus"></i>أضافة</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>
@endsection