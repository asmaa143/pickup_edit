@extends("layouts.storeindex")
@section("content")
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-toolbar">
                <!--begin::Button-->
               
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
        {!! $dataTable->table([
                    
                ],true) !!}
        </div>
        <script>
    
        </script>
    </div>
    <!--end::Card-->
</div>

@endsection

@section('scripts')

    {{$dataTable->scripts()}} 
    
	

<script src="{{asset('assets/js/sweetalert.min.js')}}"></script> 

@endsection