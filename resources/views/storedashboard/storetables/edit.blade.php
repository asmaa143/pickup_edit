@extends("layouts.storeindex")
@section("content")
<form action="{{route('storetables.update',$storetable->id)}}" method="post"> 
    @csrf
    @method("PUT")
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">

{{__('messages.addstoretable')}}  
      </div>
        </div>

        <div class="card-body">
            <div class="row">
             
                
                

              

               
               <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__("messages.branches")}}
                        </label>
                        <select data-live-search="true"  required data-live-search-style="startsWith" name="branch_id"
                        class="form-control selectpicker" title="{{__("messages.branches")}}" >
                        @foreach($branches as $branch)
                            <option value='{{$branch->id}}' @if($storetable->branch_id == $branch->id) selected @endif>{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.tablenumber')}}  
                        </label>
                        <input type="number" value="{{$storetable->tablenumber}}"  name="tablenumber" required
                         placeholder=" {{__('messages.tablenumber')}}  " 
                           class="form-control @error('tablenumber') is-invalid @enderror" />
            @error('tablenumber') <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
                {{__('messages.save')}}  </button>
        </div>
    </div>
</form>
@endsection