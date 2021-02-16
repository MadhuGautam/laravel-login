@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">{{$data->name}}</h4>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Assigned Hotel: {{$hotel_list[0]->hotel_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <p>Salary: {{ $data->salary }}</p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">

                                    <p>Employee Name: {{ $data->name }}</p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">

                                    <p>Employee Email: {{ $data->email }}</p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">

                                    <p>Position: {{ $data->usertype }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">

                                    <p>Address: {{ $data->address }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">

                                    <p>Contact: {{ $data->contact }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">

                                    <p>Description: {{ $data->description }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">

                                    <button onclick="location.href='{{ route('employee.edit',[$data->id]) }}'" class="btn btn-primary pull-left">Edit Employee</button>
                                    <div class="clearfix"></div>
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

                </div>
            </div>
        </div>
    </div>

@endsection
