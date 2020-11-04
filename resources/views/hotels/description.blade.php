@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">{{$data->hotel_name}}</h4>
                <p class="card-category">{{$data->hotel_email}}</p>
                </div>
                <div class="card-body">
                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                        <input placeholder="Select date" type="text" id="example" class="form-control">
                        <label for="example">Try me...</label>
                        <i class="fas fa-calendar input-prefix" tabindex=0></i>
                    </div>

                        @if(!$data->rooms->isEmpty())
                            <div id = 'msg' class="row mw-100">
                                @foreach($data->rooms as $row)
                                    <div id="{{$row->id}}" class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15 m-1 {{$row->room_availability_status > 0 ? 'border-danger':'border-success' }}">
                                        <div class="text-center">
                                            <h2>{{$row->id}}</h2>
                                            <p>{{$row->room_cat}}<br>{{$row->room_availability_status > 0 ? 'Booked':'Available' }}</p>

                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <form>
                                <button type="button" rel="tooltip" title="Add Rooms" onclick="getMessage()" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">add</i> Replace Message
                                </button>
                            </form>
                            {{-- <button type="button" rel="tooltip" title="Add Rooms" onclick="location.href='{{ url('/hotel') }}/{{ $data->id.'/addRoom'}}'" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">add</i> Add More Rooms
                            </button> --}}

                        @else
                            <h4 class="title">No rooms found</h4>
                            {{-- <span>
                            <button type="button" rel="tooltip" title="Add Rooms" onclick="location.href='{{ url('/hotel') }}/{{ $data->id.'/addRoom'}}'" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">add</i> Add Rooms
                                </button>
                            </span> --}}
                        @endif

                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                <a href="javascript:;">
                    <img class="img" src="{{$data->hotel_image}}" />
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
    {{-- <div id = 'msg' class="row mw-100">@foreach($data->rooms as $row)
        <div id="room_data" class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15">
            {{$row->id}}
        </div>
    @endforeach</div>
        <form>
            <button type="button" rel="tooltip" title="Add Rooms" onclick="getMessage()" class="btn btn-primary btn-link btn-sm">
                <i class="material-icons">add</i> Replace Message
            </button>
        </form> --}}

    <script>
        function getMessage() {
            alert(document.getElementById("1").innerText);
            var filterDate = Date.parse("2020-10-16");
            alert(filterDate);
            $.ajax({
              type:'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              url:'/getmsg/{id}/{bookingDate}',
              //data:'_token = <?php echo csrf_token() ?>', '{ id: 1 }'',
              data: { "_token": "{{ csrf_token() }}", id: 1, bookingDate: "2020-10-29 10:32:41"},

              success:function(data) {
                  if(data){
                    var json_data="";
                    var booking_status="";
                    var border_color = "";
                    console.log(data);
                   // console.log(data[0].id);
                     jQuery.each(data, function(i, val) {
                        jQuery.each(val.bookings, function(i, bookVal) {
                            if(bookVal.id){
                               var bookingfromdatetime = bookVal.Booking_date_from;
                               var bookingfromdate = bookingfromdatetime.split(" ")
                               var bookingtodatetime = bookVal.Booking_date_to;
                               var bookingtodate = bookingtodatetime.split(" ");
                               alert(Date.parse(bookingtodate[0]));
                               if((filterDate >= Date.parse(bookingfromdate[0])) && (filterDate <= Date.parse(bookingtodate[0])) )
                               alert("in if");
                               booking_status = "Booked"; border_color = "border-danger";
                            }else{
                                booking_status = "Available"; border_color = "border-success";
                            }

                            });

                            json_data += '<div class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15 m-1 '+border_color+' ">'+
                                        '<div class="text-center">'+
                                            '<h2>'+val.id+'</h2>'+
                                            '<p>'+val.room_cat+'<br>'+booking_status+'</p>'+

                                        '</div>'+

                                    '</div>';
                        //json_data += '<div id="room_data" class="col-lg-3 col-md-6 col-sm-6 border border-success  rounded mw-15">'+val.id+'</div>';

                    });
                    $("#msg").empty().append(json_data);
                }
              }
           });
        //    $.ajax({
        //       type:'POST',
        //       headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //       url:'/getmsg/{id}/{bookingDate}',
        //       //data:'_token = <?php echo csrf_token() ?>', '{ id: 1 }'',
        //       data: { "_token": "{{ csrf_token() }}", id: 1, bookingDate: "2020-10-29 10:32:41"},

        //       success:function(data) {
        //           if(data){
        //             var json_data="";
        //             console.log(data);
        //            // console.log(data[0].id);
        //             jQuery.each(data, function(i, val) {
        //                 json_data += '<div id="room_data" class="col-lg-3 col-md-6 col-sm-6 border border-success  rounded mw-15">'+val.id+'</div>';

        //             });
        //             $("#msg").empty().append(json_data);
        //         }
        //       }
        //    });
        }
     </script>
@endsection
