@extends("layouts.storeindex")
@section("content")
<form action="{{route('storeemployees.update',$employee->id)}}" method="post"> 
    @csrf
    @method('PUT')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">

{{__('messages.addemployee')}}  
      </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.name')}}   
                        </label>
                        <input type="text"  name="name" value="{{$employee->name}}"  placeholder=" 
                         {{__('messages.name')}}    " required
                         class="form-control @error('name') is-invalid @enderror" />
            @error('name') <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                 
                    </div>
                </div>

                <!-- <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                            دور المستخدم
                        </label>
                        <select data-live-search="true" data-live-search-style="startsWith" class="form-control selectpicker" title="دور المستخدم">
                            <option>محاسب</option>
                            <option>ديلفري</option>
                        </select>
                    </div>
                </div> -->

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.phone')}}  
                        </label>
                        <input type="number"  value="{{$employee->phone}}"   name="phone"
                         placeholder=" {{__('messages.phone')}}  " 
                           class="form-control @error('phone') is-invalid @enderror" />
            @error('phone') <span class="invalid-feedback">
                {{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.email')}}  
                        </label>
                        <input type="email" value="{{$employee->email}}" class="form-control"
                          name="email" placeholder=" {{__('messages.email')}}   " />
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                        {{__('messages.password')}}  
                        </label>
                        <input type="password" id="txtPassword" class="form-control" name="password" placeholder="{{__('messages.password')}}   " />
                        <button type="button" id="btnToggle" class="toggle">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                    <!-- =========== show password =========== -->
                    <script>
                        let passwordInput = document.getElementById('txtPassword'),
                            toggle = document.getElementById('btnToggle'),
                            icon = document.getElementById('eyeIcon');

                        function togglePassword() {
                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                // icon.classList.add("fa-eye-slash");
                                toggle.innerHTML = '<i class="fa fa-eye"></i>';
                            } else {
                                passwordInput.type = 'password';
                                // icon.classList.remove("fa-eye-slash");
                                toggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
                            }
                        }

                        function checkInput() {
                            //if (passwordInput.value === '') {
                            //toggle.style.display = 'none';
                            //toggle.innerHTML = 'show';
                            //  passwordInput.type = 'password';
                            //} else {
                            //  toggle.style.display = 'block';
                            //}
                        }

                        toggle.addEventListener('click', togglePassword, false);
                        passwordInput.addEventListener('keyup', checkInput, false);
                    </script>
                    <!-- =========== show password =========== -->
                </div>
            </div>
               <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>
                           {{__("messages.branches")}}
                        </label>
                        <select data-live-search="true" data-live-search-style="startsWith" name="branch_id"
                        class="form-control selectpicker" >
                        @foreach($branches as $branch)
                            <option value='{{$branch->id}}' @if($employee->branch_id == $branch->id) 
                                selected @endif>{{$branch->name}}</option>
                            @endforeach
                        </select>
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