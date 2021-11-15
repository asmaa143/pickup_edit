@extends("layouts.adminindex")
@section("content")
<form action="{{route('featurestype.index')}}">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                أضافة نوع الميزة
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            نوع الميزة
                            <span class="text-danger">AR</span>
                        </label>
                        <input type="text" class="form-control" placeholder="نوع الميزة" />
                    </div>
                </div>
                <!-- For loop this div -->

                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            نوع الميزة
                            <span class="text-danger">EN</span>
                        </label>
                        <input type="text" class="form-control" placeholder="نوع الميزة" />
                    </div>
                </div>
            </div>
            <!-- For loop this div -->
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
        </div>
    </div>
</form>
@endsection