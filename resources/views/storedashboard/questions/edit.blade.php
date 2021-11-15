@extends("layouts.storeindex")
@section("content")
<form action="{{route('questions.update',$question->id)}}"  enctype="multipart/form-data" 
    method="post">
@csrf
@method('PUT')
<!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('messages.editquestion')}} 
            </div>
        </div>
        <div class="card-body">
    
            <div class="row">
       
                @foreach($store->languages as $lang)
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.question_'.$lang->lang) }} 
                            <span class="text-danger"> ( {{ $lang->lang }} )</span>
                        </label>
                        <input name="title-{{ $lang->lang }}" typ="text" required class="form-control
                        @error('title-' . $lang->lang) is-invalid @enderror" value="{{$question->translate($lang->lang)->title}}" rows="6">
                      
                        @error('title-' . $lang->lang) <span class="invalid-feedback">
                            {{ $message }}</span> @enderror
                        
                     
                    </div>
                </div>
                @endforeach
              @foreach($store->languages as $lang)
                <!-- For loop this div -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{ __('messages.answer_'.$lang->lang) }} 
                            <span class="text-danger"> ( {{ $lang->lang }} )</span>
                        </label>
                        <textarea name="text-{{ $lang->lang }}" required class="form-control
                        @error('text-' . $lang->lang) is-invalid @enderror" rows="6">{{$question->translate($lang->lang)->text}}
                       </textarea>
                        @error('text-' . $lang->lang) <span class="invalid-feedback">
                            {{ $message }}</span> @enderror
                        
                     
                    </div>
                </div>
                @endforeach
                <!-- For loop this div -->

            
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
            {{__('messages.save')}} 
            </button>
        </div>
    </div>
</form>
@endsection