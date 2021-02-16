@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            {{$data}}
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
                                <button type="button" rel="tooltip" title="Add Room" onclick="location.href='{{ url('/hotel') }}/{{ $data->id.'/room/create'}}'" class="btn btn-primary btn-sm">
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

            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url:'/getmsg/{id}',
                data: { "_token": "{{ csrf_token() }}", id: hotel_id},
                success:function(data) {
                var json_data ="";
                if(data){
                    var booking_status ="";
                    var border_color = "";
                    var booking_detail_link = "";

                    jQuery.each(data, function(i, val)
                    {
                       console.log(val);
                        if(val.bookings!="" && val.bookings!=null)
                        {
                            jQuery.each(val.bookings, function(j, bookVal)
                            {
                                var bookingfromdatetime = bookVal.Booking_date_from;
                                var bookingfromdate = bookingfromdatetime.split(" ");
                                var bookingtodatetime = bookVal.Booking_date_to;
                                var bookingtodate = bookingtodatetime.split(" ");
                                var booking_detail_link = "";

                                console.log(Date.parse(bookingtodate[0])+" "+ Date.parse(bookingtodate[0]));
                                console.log(bookingtodate[0]);
                                console.log((fd >= Date.parse(bookingfromdate[0])) && (fd <= Date.parse(bookingtodate[0])) );

                                if((fd >= Date.parse(bookingfromdate[0])) && (fd <= Date.parse(bookingtodate[0])) )
                                {
                                    console.log(bookVal.id);
                                    booking_status = "Booked"; border_color = "border-danger"; booking_detail_link = "{{ url('/hotel') }}/"+bookVal.hotel_lists_id+"{{ '/room' }}/"+val.id+"{{ '/book' }}/"+bookVal.id;

                                }else{

                                    booking_status = "Available"; border_color = "border-success"; booking_detail_link = "{{ url('/hotel') }}/"+bookVal.hotel_lists_id+"{{ '/room' }}/"+val.id;
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

                                booking_status = "Available"; border_color = "border-success";
                                //booking_detail_link ="{{ route('book.create', ["+ val.hotel_lists_id + "," + val.id +"])}}";
                                booking_detail_link = "{{ url('/hotel') }}/"+val.hotel_lists_id+"{{ '/room' }}/"+val.id+"{{ '/book' }}";

                                json_data += '<div class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15 m-1 '+ border_color +' ">'+
                                    '<a href="' + booking_detail_link + '"><div class="text-center">'+
                                        '<h2>'+ val.room_name +'</h2>'+
                                        '<p>'+ val.room_cat +'<br>'+ booking_status +'</p>'+
                                    '</div></a>'+
                                '</div>';

                                $("#msg").empty().append(json_data);

                            }

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
