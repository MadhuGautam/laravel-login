@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <span id="hotel_id" style="visibility: hidden">{{$data->id}}</span>
                        <h4 class="card-title">{{$data->hotel_name}}</h4>
                        <p class="card-category">{{$data->hotel_email}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row mw-25 m-3">
                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                    <label for="booking_date">Select Date</label>
                                    <input type="date" id="booking_date" class="form-control" value="{{ date('Y-m-d') }}" onchange="getMessage()">
                                </div>
                            </div>

                            @if(!$data->rooms->isEmpty())
                                <div id = 'msg' class="row mw-100 m-3">rooms
                                        {{-- room created dynamically --}}
                                </div>

                            @else
                                <h4 class="title">No rooms found</h4>

                            @endif

                            <span>
                                <button type="button" rel="tooltip" title="Add Room" onclick="location.href='{{ route('room.create', $data->id)}}'" class="btn btn-primary btn-sm">
                                    <i class="material-icons">add</i>Add Room
                                </button>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="javascript:;">
                                <img class="img" src="{{ (str_contains($data->hotel_image,"https"))? $data->hotel_image : '../../uploads/'.$data->hotel_image }}" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">{{$data->hotel_location}}</h6>
                            <h4 class="card-title">{{$data->hotel_name}}</h4>
                            <p class="card-description">
                                {{$data->description}}
                            </p>
                            <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            getMessage();
        };

        function getMessage()
        {

            var hotel_id = {{$data->id}};
            var formdate = document.getElementById("booking_date").value;
            var fd = Date.parse(formdate);
            var json_data ="";

            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                //url:'/getmsg/{id}{bookingDate}',
                url: '{{ route("getmsg.post") }}',
                data: { "_token": "{{ csrf_token() }}", id: hotel_id, bookingDate: formdate},
                success:function(data) {

                if(data){
                    console.log(data);
                    var booking_status ="";
                    var border_color = "";
                    var booking_detail_link = "";

                    jQuery.each(data, function(i, val)
                    {
                         if(val.room_availability_status!="0" && val.room_availability_status!=null)
                        {

                            booking_status = "Booked"; border_color = "border-danger";
                            booking_detail_link = "{{ url('/hotel') }}/"+val.hotel_lists_id+"{{ '/room' }}/"+val.id+"{{ '/bookedDate' }}/"+formdate;
                        }
                        else{

                            booking_status = "Available"; border_color = "border-success";
                            booking_detail_link = "{{ url('/hotel') }}/"+val.hotel_lists_id+"{{ '/room' }}/"+val.id+"{{ '/book/create' }}/";
                        }

                        json_data += '<div class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15 m-1 '+ border_color +' ">'+
                                        '<a href="' + booking_detail_link + '"><div class="text-center">'+
                                            '<h2>'+ val.room_name +'</h2>'+
                                            '<p>'+ val.room_cat +'<br>'+ booking_status +'</p>'+
                                        '</div></a>'+
                                    '</div>';

                                    $("#msg").empty().append(json_data);

                    });
                }
                else{
                    json_data += '<p>data not found</p>';

                                $("#msg").empty().append(json_data);
                }

              }
           });

        }
    </script>
@endsection
