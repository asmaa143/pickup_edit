@extends("layouts.storeindex")
@section("content")
<form action="{{route('storeminimum')}}" method="post">
    @csrf
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                تفعيل الحد الدنى للطلب
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="checkbox-list">
                            <label class="checkbox">
                                <input type="checkbox" name="active" value ="1" id="minimumprice" 
                              @if($setting)  @if($setting->active == 1) checked @endif @endif>
                                <span></span>تفعيل الحد الأدنى للطلب
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <input type="number" @if($setting)  name="least_price" 
                    value="{{$setting->least_price }}" @endif  class="form-control minimumPriceInput"
                     placeholder="الحد الأدنى للطلب" />
                </div>
            </div>
        </div>
        <script>
           
            $(function() {
                enable_cb1();
                $("#minimumprice").click(enable_cb);
            });

            function enable_cb() {
           //     console.log(this.checked);
                if (this.checked) {
                    $("input.minimumPriceInput").removeAttr("disabled");
                } else {
                    $("input.minimumPriceInput").attr("disabled", true);
                }
            }  function enable_cb1() {
              
                if ($("#minimumprice").is(":checked") ){
                  
                    $("input.minimumPriceInput").removeAttr("disabled");
                } else {
                    $("input.minimumPriceInput").attr("disabled", true);
                }
            }
        </script>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
        </div>
    </div>
</form>
@endsection