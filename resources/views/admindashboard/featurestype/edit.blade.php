@extends("layouts.adminindex")
@section("content")
<form action="{{route('featurestype.index')}}">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                تعديل محافظة
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            المحافظة
                            <span class="text-danger">AR</span>
                        </label>
                        <input type="text" class="form-control" placeholder="المحافظة" />
                    </div>
                </div>
                <!-- For loop this div -->

                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            المحافظة
                            <span class="text-danger">EN</span>
                        </label>
                        <input type="text" class="form-control" placeholder="المحافظة" />
                    </div>
                </div>
                <!-- For loop this div -->
            </div>
        </div>

        <div class="card-footer">
            <submit type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</submit>
        </div>
    </div>
</form>
@endsection