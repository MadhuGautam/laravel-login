@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">New Room</h4>

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

                    <form action="{{ route('room.store', $hotel_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md">
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-md-6">

                                        <label>Hotel Code</label>--}}
                                        <input type="hidden" id="hotel_lists_id" name="hotel_lists_id" value="{{$hotel_id}}" class="form-control" readonly="readonly">
                                        <input type="hidden" id="user_id" name="user_id" class="form-control" value="33" required>

                                    {{-- </div> --}}
                                {{-- </div> --}}
                                <div class="row">
                                    <div class="col-md">

                                        <label>Room</label>
                                        <input type="text" id="room_name" name="room_name" class="form-control" value="" required>

                                    </div>
                                    <div class="col-md">

                                        <label>Category</label>
                                        <select name="room_cat" id="room_cat" placeholder=".form-control-lg" class="form-control form-control-sm">
                                            <option value="luxury">Luxury</option>
                                            <option value="economy">Economy</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md">

                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">

                                <button type="submit" class="btn btn-primary pull-right">Add Room</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
