@extends("layouts.adminindex")
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
            <table class="table table-responsive-sm" id="table">
                <thead class="thead-light">
                    <tr>
                      
                        <th scope="col"> {{__("messags.language")}}</th>
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <tr>
                        <td>{{$localeCode}}</td>
                      
                        <td>
                            <a href="{{route('editlanguage',['locale' => $localeCode])}}" 
                            class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                <i class="fas fa-edit text-primary"></i>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Card-->
</div>

@endsection

@section('scripts')


@endsection