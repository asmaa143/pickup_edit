@extends("layouts.storeindex")
@section('content')
    <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST" class="avatar-upload">
        @csrf
        @method("PUT")
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    {{ __('messages.editproduct') }}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- ============= Upload image ============= -->
                    <div class="upload_img">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" class="{{ $errors->has('email') ? 'alert alert-danger' : '' }}" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview container2">
                            <div id="imagePreview" style="background-image:url({{ asset($product->image) }})">
                            </div>
                        </div>
                    </div>
                    <!-- ============= Upload image ============= -->
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                                    $('#imagePreview').hide();
                                    $('#imagePreview').fadeIn(650);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("#imageUpload").change(function() {
                            readURL(this);
                        });
                    </script>
                </div>
                <div class="row">
                    <!-- For loop this div -->
                    @foreach ($store->languages as $lang)
                        <!-- For loop this div -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>
                                    {{ __('messages.title_' . $lang->lang) }}
                                    <span class="text-danger"> ( {{ $lang->lang }} )</span>
                                </label>
                                <input type="text" class="form-control
                          @error('title-' . $lang->lang) is-invalid @enderror" name="title-{{ $lang->lang }}" required value="{{ $product->translate($lang->lang)->title }}" placeholder="{{ __('messages.product_' . $lang->lang) }}" />
                                @error('title-' . $lang->lang) <span class="invalid-feedback">
                                    {{ $message }}</span> @enderror
                            </div>
                        </div>
                    @endforeach
                    <!-- For loop this div -->
                    <!-- For loop this div -->

                    <!-- <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>
                                                    اسم المنتج
                                                    <span class="text-danger">EN</span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="اسم المنتج" />
                                            </div>
                                        </div> -->
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.category') }}
                            </label>
                            <select class="form-control selectpicker" required name="category_id" title=" {{ __('messages.category') }}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($product->category_id == $category->id)selected @endif>{{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.tag') }}
                            </label>
                            <select class="form-control selectpicker" name="tag_id[]" multiple="multiple" title="{{ __('messages.tag') }}">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @if (in_array($tag->id, $product->tags->pluck('id')->toArray())) selected @endif>{{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.preparation_time') }}
                            </label>
                            <input type="number" name="preparation_time" class="form-control" required placeholder="  {{ __('messages.preparation_time') }} " value="{{ $product->preparation_time }}" />
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.calories') }}
                            </label>
                            <input type="number" class="form-control" name="calories" placeholder="{{ __('messages.calories') }} " value="{{ $product->calories }}" />
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.default_price') }}
                            </label>
                            <input type="number" class="form-control priceInput" name="default_price" placeholder=" {{ __('messages.default_price') }}" value="{{ $product->default_price }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.discount') }}
                            </label>
                            <input type="number" class="form-control priceInput" max="99" min="0" value="{{ $discount->value ?? 0 }}" name="value" placeholder=" {{ __('messages.value') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.epired_date') }}
                            </label>
                            <input type="date" class="form-control priceInput" value="{{ $discount->epired_date ?? 0 }}" name="epired_date" placeholder=" {{ __('messages.epired_date') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 d-flex align-items-center">

                        <div class="form-group w-100 m-0">
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" id="priceCheckbox" name="is_price" value="1" @if ($product->is_price == 1) checked @endif>
                                    <span></span>{{ __('messages.default_price') }}
                                </label>
                            </div>
                        </div>
                        <script>
                            $(function() {
                                enable_cb1();
                                $("#priceCheckbox").click(enable_cb1);
                            });

                            function enable_cb1() {

                                if ($("#priceCheckbox").is(":checked")) {

                                    $("input.priceInput").removeAttr("disabled");
                                    // $("input.priceInput1").removeAttr("disabled");
                                    // $("input.priceInput2").removeAttr("disabled");
                                } else {
                                    $("input.priceInput").attr("disabled", true);
                                    // $("input.priceInput1").attr("disabled", true);
                                    // $("input.priceInput2").attr("disabled", true);
                                }
                            }
                        </script>

                        <!-- <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label>
                                                    الخصم
                                                </label>
                                                <input type="number" class="form-control" placeholder="الخصم" />
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-12">
                                            <div class="form-group">
                                                <label for="" class="nonelabel">الخصم</label>
                                                <select class="form-control selectpicker" title="الخصم">
                                                    <option>%</option>
                                                    <option>EG</option>
                                                </select>
                                            </div>
                                        </div> -->
                    </div>

                    <!-- <div id="kt_repeater_1">
                                        <div class="form-group">
                                            <div class="row">
                                                <div data-repeater-list="" class="col-lg-12">
                                                    <label>
                                                        مكونات الصنف
                                                    </label>
                                                    <div data-repeater-item="" class="form-group row align-items-center">

                                                        <div class="col-5">
                                                            <label>
                                                                <span class="text-danger">AR</span>
                                                            </label>
                                                            <input type="text" class="form-control" placeholder="المكون" />
                                                        </div>

                                                        <div class="col-5">
                                                            <label>
                                                                <span class="text-danger">EN</span>
                                                            </label>
                                                            <input type="text" class="form-control" placeholder="المكون" />
                                                        </div>


                                                        <div class="col-2">
                                                            <label for="" class="nonelabel">delete</label>
                                                            <a href="javascript:;" data-repeater-delete="" class="btn d-block btn-sm font-weight-bolder btn-light-danger">
                                                                <i class="la la-trash-o"></i>Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                                        <i class="la la-plus"></i>أضافة مكون</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div> -->
                </div>

                <section id="section2">
                    @if ($product->extras)
                        @foreach ($product->extras as $key => $extra)
                            @if ($loop->first)
                                <div id="removes{{ $key }}">
                                    <label>الاضافات </label>
                                    <div class="row" id="row2" style="position: relative;">
                                        @foreach ($store->languages as $lang)
                                            <!-- For loop this div -->
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>
                                                        {{ __('messages.title_' . $lang->lang) }}
                                                        <span class="text-danger"> ( {{ $lang->lang }} )</span>
                                                    </label>
                                                    <input type="text" class="form-control
                          @error('extratitle-' . $lang->lang) is-invalid @enderror" name="extratitle-{{ $lang->lang }}[]" required value="{{ $extra->translate($lang->lang)->title }}" />
                                                    @error('title-' . $lang->lang) <span class="invalid-feedback">
                                                        {{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-3">
                                            {{-- <label for="" class="nonelabel">Compulsory or optional</label> --}}
                                            <div class="checkbox-inline">
                                                <span class="switch w-50 btn btns-m switch-outline switch-icon switch-primary">
                                                    <label>optional</label>
                                                    <label>
                                                        <input type="checkbox" name="optional[]" @if ($extra->optional == 1) checked @endif value="1">
                                                        <span></span>
                                                    </label>
                                                </span>
                                                <span class="switch w-50 btn btns-m switch-outline switch-icon switch-primary">
                                                    <label>multichoice</label>
                                                    <label>
                                                        <input type="checkbox" name="multichoice[]" @if ($extra->multichoice == 1) checked @endif value="1">
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-1 p-0">
                                            <label class="nonelabel">delete</label>
                                            <button class="btn btn-sm w-100 d-block font-weight-bolder btn-light-danger" onclick="removes({{ $key }})">
                                                <i class="la la-trash-o"></i> Delete
                                            </button>
                                        </div>

                                        <div class="col-11 mx-auto d-flex align-items-center p-0 my-2">
                                            <button class="btn btn-large btn-success add" type="button" onclick="get1({{ $key }})">Add</button>
                                        </div>
                                    </div>

                                @else
                                    <div id="removes{{ $key }}">
                                        <div class="row" id="row2" style="position: relative;">
                                            @foreach ($store->languages as $lang)
                                                <!-- For loop this div -->
                                                <div class="col-md-3 col-sm-12">
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('messages.title_' . $lang->lang) }}
                                                            <span class="text-danger"> ( {{ $lang->lang }} )</span>
                                                        </label>
                                                        <input type="text" class="form-control
                          @error('extratitle-' . $lang->lang) is-invalid @enderror" name="extratitle-{{ $lang->lang }}[]" required value="{{ $extra->translate($lang->lang)->title }}" />
                                                        @error('title-' . $lang->lang) <span class="invalid-feedback">
                                                            {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-2">
                                                <label for="" class="nonelabel">Compulsory or optional</label>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                                        <input type="checkbox" name="optional[]" @if ($extra->optional == 1) checked @endif value="1">
                                                        <span></span>optional</label>
                                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                                        <input type="checkbox" name="multichoice[]" @if ($extra->multichoice == 1) checked @endif value="1">
                                                        <span></span>multichoice</label>
                                                </div>
                                            </div>


                                            <span class="svg-icon svg-icon-primary svg-icon-2x col-1 d-inline-block new" onclick="get1({{ $key }})" style="position: absolute;top:30px;left:-10px;">
                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,
                                6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,
                                12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18
                                C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12
                                C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>

                                            <span class="col-1 d-inline-block" style="position: absolute;top:30px;left:0px;margin-right:0px;">
                                                <span class="svg-icon svg-icon-danger svg-icon-2x" onclick="removes({{ $key }})">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-28-020759/theme/html/demo1/dist/../src/media/svg/icons/Code/Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                            <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>

                            @endif

                            @if ($extra->extrasdetails)
                                @foreach ($extra->extrasdetails as $key1 => $de)
                                    <div class="row" style="position: relative;" id="removec{{ $key1 }}">
                                        @foreach ($store->languages as $lang)
                                            <!-- For loop this div -->
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>
                                                        {{ __('messages.title_' . $lang->lang) }}
                                                        <span class="text-danger"> ( {{ $lang->lang }} )</span>
                                                    </label>
                                                    <input type="text" class="form-control
                          @error('extratitledetail{{ $key1 }}-' . $lang->lang) is-invalid @enderror" name="extratitledetail{{ $key1 }}-{{ $lang->lang }}[]" required value="{{ $de->translate($lang->lang)->title }}" placeholder="{{ __('messages.product_' . $lang->lang) }}" />
                                                    @error('title-' . $lang->lang) <span class="invalid-feedback">
                                                        {{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="form-group col-2">
                                            <label>السعر <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control " value="{{ $de->price }}" name="extrprice{{ $key1 }}[]" required="required" />
                                            @error('extrprice')
                                                <p style="color:red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-2 d-flex align-items-center justify-content-center">
                                            <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                                <input type="checkbox" name="default{{ $key1 }}[]" @if ($de->default == 1) checked @endif value="1">
                                                <span class="mx-2"></span>default</label>
                                        </div>
                                        <div class="col-2 d-flex align-items-center justify-content-center">
                                            <button class="btn btn-danger remove" type="button" onclick="removec({{ $key1 }})">remove</button>
                                        </div>
                                    </div>
                                @endforeach
            </div>
            @endif

            @endforeach
            @endif
        </section>

        <div class="row">
            <div class="col-12 my-3" style="text-align: start">
                <button class="btn btn-sm font-weight-bolder btn-light-primary p-2" id="adds">
                    <i class="la la-plus">اضافة نوع الاختيار</i>
                </button>
            </div>
        </div>
        </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">حفظ</button>
        </div>
        
    </form>
@endsection

@section('scripts')
    <script>
        $('.selectpicker').selectpicker()
    </script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/form-repeater.js') }}"></script>

    <script>
        /* Variables */
        // var p = $("#participants").val();
        // var row = $(".participantRow");

        /* Functions */
        // function getP() {
        //     p = $("#participants").val();
        // }

        // function addRow() {
        //     row.clone(true, true).appendTo("#participantTable");
        // }

        // function removeRow(button) {
        //     button.closest("tr").remove();
        // }
        // /* Doc ready */
        // $(".add").on('click', function() {
        //     getP();
        //     if ($("#participantTable tr").length < 1000) {
        //         addRow();
        //         var i = Number(p) + 1;
        //     }
        //     $(this).closest("tr").appendTo("#participantTable");
        //     if ($("#participantTable tr").length === 3) {
        //         $(".remove").hide();
        //     } else {
        //         $(".remove").show();
        //     }
        // });
        // $(".remove").on('click', function() {
        //     getP();
        //     if ($("#participantTable tr").length === 3) {
        //         //alert("Can't remove row.");
        //         $(".remove").hide();
        //     } else if ($("#participantTable tr").length - 1 == 3) {
        //         $(".remove").hide();
        //         removeRow($(this));
        //         var i = Number(p) - 1;
        //     } else {
        //         removeRow($(this));
        //         var i = Number(p) - 1;
        //     }
        // });
        let id1 = 1;
        $('#adds').click(function() {
            $('#section2').append(`
        <div id="removes${id1}">
 <div class="row"   style="position: relative;">
 @foreach ($store->languages as $lang)
     <!-- For loop this div -->
     <div class="col-md-3 col-sm-12">
         <div class="form-group">
             <label>
                 {{ __('messages.title_' . $lang->lang) }}
                 <span class="text-danger"> ( {{ $lang->lang }} )</span>
             </label>
             <input type="text" class="form-control
                                @error('extratitle-' . $lang->lang) is-invalid @enderror" name="extratitle-{{ $lang->lang }}[]" required value="{{ old('tiextratitlele-' . $lang->lang) }}" placeholder="{{ __('messages.product_' . $lang->lang) }}" />
             @error('title-' . $lang->lang) <span class="invalid-feedback">
                 {{ $message }}</span> @enderror
         </div>
     </div>
 @endforeach
                <div class="col-2">
                                    <label for="" class="nonelabel">Compulsory or optional</label>
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox"  value="1" name="optional[]" >
                                            <span></span>optional</label>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" value="1" name="multichoice[]">
                                            <span></span>multichoice</label>
                                    </div>
                                </div>


                                <span class="col-1 d-inline-block"   style="position: absolute;top:30px;left:0px;margin-right:0px;"   >
    <span class="svg-icon svg-icon-danger svg-icon-2x" onclick="removes(${id1})"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-28-020759/theme/html/demo1/dist/../src/media/svg/icons/Code/Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
            <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
        </g>
    </svg><!--end::Svg Icon--></span>
</span>
  <span class="col-1 d-inline-block"     >
<span class="svg-icon svg-icon-primary svg-icon-2x col-1 d-inline-block new"  style="position: absolute;top:-39px;left:75px;"
 onclick="get1(${id1})">
    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg-->
    <svg xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink"  width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,
        6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,
        12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18
        C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12
        C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span></span>
    </div>
                </div>`);
            id1++;
            console.log(id);
        });

        function removes(id) {
            $(`#removes${id}`).remove();
            id1--;
        }
        ///
        let id2 = 0;

        function get1(i) {
            $(`#removes${i}`).append(`
        <div class="row" style="position: relative;"  id="removec${id2}">
 @foreach ($store->languages as $lang)
     <!-- For loop this div -->
     <div class="col-md-3 col-sm-12">
         <div class="form-group">
             <label>
                 {{ __('messages.title_' . $lang->lang) }}
                 <span class="text-danger"> ( {{ $lang->lang }} )</span>
             </label>
             <input type="text" class="form-control
                                @error('extratitledetail-' . $lang->lang) is-invalid @enderror" name="extratitledetail${i}-{{ $lang->lang }}[]" required value="{{ old('extratitledetail-' . $lang->lang) }}" placeholder="{{ __('messages.product_' . $lang->lang) }}" />
             @error('title-' . $lang->lang) <span class="invalid-feedback">
                 {{ $message }}</span> @enderror
         </div>
     </div>
 @endforeach
  <div class="form-group col-2">
    <label>السعر     <span class="text-danger">*</span></label>
    <input type="number" class="form-control " value="{{ old('extrprice') }}" name="extrprice${i}[]"  required="required"/>
    @error('extrprice')
        <p style="color:red;">{{ $message }}</p>
    @enderror
   </div>

        <div class="col-2 d-flex align-items-center justify-content-center">
            <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                <input type="checkbox" name="default${i}[]" value="1">
                <span class="mx-2"></span>default</label>
        </div>

    <div class="col-2 d-flex align-items-center justify-content-center">
        <button class="btn btn-danger remove" type="button" onclick="removec(${id2})">remove</button>
    </div>
</div>`);

            id2++;
        }

        function removec(id2) {
            $(`#removec${id2}`).remove();
            id2--;
        }
    </script>
@endsection
