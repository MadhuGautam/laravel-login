@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">{{$data->name}}</h4>

                </div>
                <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Errors:</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('employee.store',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">

                                        <label>Assigned Hotel</label>
                                        {{-- <input type="text" id="hotel_lists_id" name="hotel_lists_id" value="{{ $data->hotel_lists_id }}" class="form-control" required> --}}
                                        <select name="hotel_lists_id" id="hotel_lists_id" class="form-control">
                                            @foreach ($hotel_list ?? '' as $item)
                                                <option value={{ $item->id}} selected={{(strcmp($item->id,$data->hotel_lists_id))? "selected" : ""}}>{{ $item->hotel_name}}</option>
                                            @endforeach

                                        </select>
                                        <input type="hidden" id="user_id" name="employee_id" class="form-control" value="{{ $data->id }}" readonly="readonly">

                                        {{-- <input type="hidden" id="no_of_rooms" name="no_of_rooms" class="form-control" value="{{ count($data->rooms) }}" readonly="readonly" required> --}}
                                    </div>
                                    <div class="col-md-6">

                                        <label>Salary</label>
                                        <input type="number" id="salary" name="salary" class="form-control" value="{{ $data->salary }}" min="15000" max="20000" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Employee Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Employee Email</label>
                                        <input type="text" id="email" name="email" class="form-control" value="{{ $data->email }}" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Password</label>
                                        <input type="password" id="password" name="password" class="form-control" value="{{ $data->password }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Position</label>
                                        <input type="text" id="user_type" name="user_type" class="form-control" value="{{ $data->usertype }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Address</label>
                                        <input type="text" id="address" name="address" class="form-control" value="{{ $data->address }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Contact</label>
                                        <input type="text" id="contact" name="contact" class="form-control" value="{{ $data->contact }}" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label>Profile Pic</label>
                                <input type="hidden" id="added_by" name="added_by" class="form-control" value="{{ $data->added_by }}" required>
                                <div class="image-upload-one">
                                    <div class="center">
                                      <div class="form-input">
                                        <label for="file-ip-1">
                                          <img id="file-ip-1-preview" src="{{ (str_contains($data->profile_pic,"http"))? $data->profile_pic : '../../uploads/employee/'.$data->profile_pic }}" onclick="myImgRemoveFunctionOne()">

                                        </label>
                                        <input type="file"  name="file" id="file-ip-1" accept="image/*" onchange="showPreviewOne(event);" value="{{ $data->profile_pic }}">

                                    </div>

                                    </div>
                                  </div>

                                 <script>

                                   function showPreviewOne(event){
                                     if(event.target.files.length > 0){
                                       let src = URL.createObjectURL(event.target.files[0]);
                                       let preview = document.getElementById("file-ip-1-preview");
                                       preview.src = src;
                                       preview.style.display = "block";
                                     }
                                   }
                                   function myImgRemoveFunctionOne() {
                                     document.getElementById("file-ip-1-preview").src = "{{ '../../uploads/employee/'.$data->profile_pic }}";
                                   }

                                 </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">

                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">

                                <button type="submit" class="btn btn-primary pull-right">Edit Employee</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
