@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">New Hotel</h4>

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

                    <form action="{{ route('hotel.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-md-6">

                                        <label>Hotel Code</label>
                                        <input type="text" id="hotel_id" name="hotel_id" value="" class="form-control" readonly="readonly">

                                    </div> --}}
                                    {{-- <div class="col-md-6"> --}}

                                        {{-- <label>Total Rooms</label> --}}

                                            <input type="hidden" id="no_of_rooms" name="no_of_rooms" class="form-control" value="0" required>
                                            <input type="hidden" id="user_id" name="user_id" class="form-control" value="33" required>

                                    {{-- </div> --}}
                                {{-- </div> --}}
                                <div class="row">
                                    <div class="col-md">

                                        <label>Hotel Name</label>
                                        <input type="text" id="hotel_name" name="hotel_name" class="form-control" value="" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Hotel Email</label>
                                        <input type="text" id="hotel_email" name="hotel_email" class="form-control" value="" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Hotel Owner</label>
                                        <input type="text" id="hotel_owner" name="hotel_owner" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">

                                        <label>Hotel Location</label>
                                        <input type="text" id="hotel_location" name="hotel_location" class="form-control" value="" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                {{-- <label>Hotel Image</label>--}}
                                <input type="hidden" id="added_by" name="added_by" class="form-control" value="" required>
                                <div class="image-upload-one">
                                    <div class="center">
                                      <div class="form-input">
                                        <label for="file-ip-1">
                                            <img id="file-ip-1-preview" src="https://via.placeholder.com/300" onclick="myImgRemoveFunctionOne()">

                                        </label>
                                        <input type="file"  name="file" id="file-ip-1" accept="image/*" onchange="showPreviewOne(event);" value="">
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
                                     document.getElementById("file-ip-1-preview").src = "https://via.placeholder.com/300";
                                   }

                                 </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">

                                <label>Hotel Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">

                                <button type="submit" class="btn btn-primary pull-right">Add Hotel</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
