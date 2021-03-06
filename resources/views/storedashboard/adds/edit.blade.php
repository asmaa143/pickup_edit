@extends("layouts.storeindex")
@section('content')
    <form action="{{ route('adds.update', $add->id) }}" enctype="multipart/form-data" method="POST" class="avatar-upload">
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
                                    ?????? ????????????
                                    <span class="text-danger">EN</span>
                                </label>
                                <input type="text" class="form-control" placeholder="?????? ????????????" />
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
                                {{ __('messages.default_price') }}
                            </label>
                            <input type="number" class="form-control" required name="default_price" placeholder=" {{ __('messages.default_price') }}" value="{{ $product->default_price }}" />
                        </div>
                    </div>

                    <!-- <div class="col-md-5 col-sm-12">
                            <div class="form-group">
                                <label>
                                    ??????????
                                </label>
                                <input type="number" class="form-control" placeholder="??????????" />
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <div class="form-group">
                                <label for="" class="nonelabel">??????????</label>
                                <select class="form-control selectpicker" title="??????????">
                                    <option>%</option>
                                    <option>EG</option>
                                </select>
                            </div>
                        </div> -->
                </div>

                <section id="section2">
                    <label>???????????????? </label>
                    @if ($product->extras)
                        @foreach ($product->extras as $key => $extra)
                            @if ($loop->first)
                                <div id="removes{{ $key }}">
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
                                        <div class="col-md-3 col-9">
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

                                        <div class="col-md-1 col-3 p-0">
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
                                            <div class="col-md-3 col-9">
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

                                            <div class="col-md-1 col-3 p-0">
                                                <label class="nonelabel">delete</label>
                                                <button class="btn btn-sm w-100 d-block font-weight-bolder btn-light-danger" onclick="removes({{ $key }})">
                                                    <i class="la la-trash-o"></i> Delete
                                                </button>
                                            </div>

                                            <div class="col-11 mx-auto d-flex align-items-center p-0 my-2">
                                                <button class="btn btn-large btn-success add" type="button" onclick="get1({{ $key }})">Add</button>
                                            </div>

                                        </div>

                            @endif

                            @if ($extra->extrasdetails)
                                @foreach ($extra->extrasdetails as $key1 => $de)
                                    <div class="row" style="position: relative;" id="removec{{ $key1 }}">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>
                                                    {{ __('messages.product') }}

                                                </label>
                                                <select class="form-control selectpicker" required name="product_id{{ $key }}[]" title=" {{ __('messages.product') }}">
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" @if ($de->product_id == $product->id) selected @endif>{{ $product->title }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-2 col-3 d-flex align-items-center justify-content-center">
                                            <button class="btn btn-danger remove" type="button" onclick="removec({{ $key1 }})">remove</button>
                                        </div>
                                    </div>
                                @endforeach
            @endif

            @endforeach
            @endif

        </div>
        </section>

        <div class="row">
            <div class="col-12 my-3" style="text-align: start">
                <button class="btn btn-sm font-weight-bolder btn-light-primary p-2" id="adds">
                    <i class="la la-plus">?????????? ?????? ????????????????</i>
                </button>
            </div>
        </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">??????</button>
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
     <div class="col-md-4 col-sm-12">
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

                <div class="col-md-3 col-9">
                    <div class="checkbox-inline">
                        <span class="switch w-50 btn btns-m switch-outline switch-icon switch-primary">
                            <label>optional</label>
                            <label>
                                <input type="checkbox" name="optional[]" value="1">
                                <span></span>
                            </label>
                        </span>
                        <span class="switch w-50 btn btns-m switch-outline switch-icon switch-primary">
                            <label>multichoice</label>
                            <label>
                                <input type="checkbox" name="multichoice[]" value="1">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>

                <div class="col-md-1 col-3 p-0">
                    <label class="nonelabel">delete</label>
                    <button class="btn btn-sm w-100 d-block font-weight-bolder btn-light-danger" onclick="removes(${id1})">
                        <i class="la la-trash-o"></i> Delete
                    </button>
                </div>

<div class="col-11 mx-auto d-flex align-items-center p-0 my-2">
    <button class="btn btn-large btn-success add" type="button" onclick="get1(${id1})">Add</button>
</div>

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
            <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.product') }}

                        </label>
                        <select class="form-control selectpicker" required
                        name="product_id${i}[]" title=" {{ __('messages.product') }}">
                           @foreach ($products as $product)
                               <option value="{{ $product->id }}">{{ $product->title }}</option>
                           @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-md-2 col-3 d-flex align-items-center justify-content-center">
                    <button class="btn btn-danger remove" type="button" onclick="removec(${id2})">remove</button>
                </div>

</div>`);
            $('.selectpicker').selectpicker('refresh');

            id2++;
        }

        function removec(id2) {
            $(`#removec${id2}`).remove();
            id2--;
        }
    </script>
@endsection
