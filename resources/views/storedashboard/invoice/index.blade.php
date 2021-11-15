@extends("layouts.storeindex")
@section("content")
<div class="container">
    <!-- begin::Card-->
    <div class="card card-custom overflow-hidden invoice_table" id="invoice">
        <div class="card-body p-0">
            <!-- begin: Invoice-->
            <!-- begin: Invoice header-->
            <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0 invoice_back">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="display-4 text-white font-weight-boldest mb-10 title_wizard">الفاتورة</h1>
                        <div class="d-flex flex-column align-items-md-end px-0">
                            <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                                <span>{{session()->get('order')->type}} </span>
                            </span>
                        </div>
                    </div>
                    <div class="border-bottom w-100 opacity-20"></div>
                    <div class="d-flex justify-content-between text-white pt-6">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolde mb-2r title_wizard">التاريخ</span>
                            <span class="opacity-70 text-wizard">{{Carbon\Carbon::parse(session()->get('order')->date)->format('Y-m-d')}}</span>
                        </div>
                        {{-- <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2 title_wizard">رقم الفاتورة</span>
                            <span class="opacity-70 text-wizard">000014</span>
                        </div> --}}
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2 title_wizard">العنوان</span>
                            <span class="opacity-70 text-wizard">{{session()->get('order')->address_details}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Invoice header-->
            <!-- begin: Invoice body-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table" id="invoice_table">
                            <thead>
                                <tr>
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">المنتج</th>
                           
                                    <th class="font-weight-bold text-muted text-uppercase">الكمية</th>
                                    <th class="pr-0 font-weight-bold text-muted text-uppercase">السعر</th>
                                    <th class="pr-5 font-weight-bold text-muted text-uppercase">الاضافات</th>
                                    <th class="pr-2 font-weight-bold text-muted text-uppercase">تفاصيل الاضافات</th>
                                    {{-- <th class="pr-0 font-weight-bold text-muted text-uppercase">السعر</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session()->get('order')->products as $product)
                                    
                               
                                <tr class="font-weight-boldest border-bottom-0 font-size-lg">
                                    <td class="border-top-0 pl-0 py-4">{{$product->product->title ?? ''}} </td>
                                    <td class="border-top-0 py-4">{{$product->price}}</td>
                                    <td class="border-top-0 py-4">{{$product->quantity}}</td>
                                    {{-- <td class="border-top-0 pr-0 py-4"> --}}
                                    @foreach ($product->extras as $extra)
                                   
                                    <td class="border-top-0 pr-0 py-4">
                                        {{$extra->extra->title ?? ''}}
                                    
                                    @foreach ($extra->extradetails as $extradetail)
                                    <div  class="row">   
                                                 <span class="border-top-0 pr-0 py-4">
                                                {{$extradetail->extradetail->title ?? ''}}
                                            </span> <span class="border-top-0 pr-0 py-4">
                                                {{$extradetail->price}}
                                            </span>
                                    </div>
                                        @endforeach
                                    </td>
                                    {{-- @foreach ($extra->extradetails as $extradetail)
                                    <td class="border-top-0 pr-0 py-4">
                                        {{$extradetail->extradetail->title ?? ''}}
                                    </td> <td class="border-top-0 pr-0 py-4">
                                        {{$extradetail->price}}
                                    </td>
                                    @endforeach --}}
                                
                                    @endforeach
                                {{-- </td> --}}
                                   
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end: Invoice body-->
            <!-- begin: Invoice footer-->
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-6">
                    <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                        <div class="d-flex flex-column text-md-right">
                            <span class="font-size-lg font-weight-bolder mb-1">اجمالي الفاتورة</span>
                            <span class="font-size-h2 font-weight-boldest text-danger mb-1 text-center">{{session()->get('order')->final_price}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary font-weight-bold" onclick="printDiv('invoice')">طباعة الفاتورة</button>
                        <script>
                            function printDiv(divName) {
                                var printContents = document.getElementById(divName).innerHTML;
                                var originalContents = document.body.innerHTML;

                                document.body.innerHTML = printContents;

                                window.print();

                                document.body.innerHTML = originalContents;
                            }
                        </script>
                    </div>
                </div>
            </div>
            <!-- end: Invoice footer-->
            <!-- end: Invoice-->
        </div>
    </div>
    <!-- end::Card-->
</div>
@endsection