@extends('layouts.dashboard')

@section('content')


   <div id = 'msg' class="row mw-100 m-3">
        {{ $data}}
   </div>

   <script>
    window.onload = function() {
        getMessage();
    };

    function getMessage()
    {
        var formdate = document.getElementById("booking_date").value;
        var fd = Date.parse(formdate);

        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url:'/getmsg/{id}/{bookingDate}',
            data: { "_token": "{{ csrf_token() }}", id: 1, bookingDate: "2020-10-29 10:32:41"},

            success:function(data) {
            if(data){
                var json_data="";
                var booking_status="";
                var border_color = "";
                var booking_detail_link = "";

                console.log(data);
                jQuery.each(data, function(i, val)
                {
                    if(val.bookings.length)
                    {

                        jQuery.each(val.bookings, function(j, bookVal)
                        {
                            var bookingfromdatetime = bookVal.Booking_date_from;
                            var bookingfromdate = bookingfromdatetime.split(" ")
                            var bookingtodatetime = bookVal.Booking_date_to;
                            var bookingtodate = bookingtodatetime.split(" ");
                            var booking_detail_link = "";

                            console.log(Date.parse(bookingtodate[0])+" "+ Date.parse(bookingtodate[0]));
                            console.log(fd);
                            console.log((fd >= Date.parse(bookingfromdate[0])) && (fd <= Date.parse(bookingtodate[0])) );

                            if((fd >= Date.parse(bookingfromdate[0])) && (fd <= Date.parse(bookingtodate[0])) )
                            {

                                booking_status = "Booked"; border_color = "border-danger"; booking_detail_link = "{{ url('/hotel') }}/"+bookVal.hotel_lists_id+"{{ '/room' }}/"+val.id;

                            }else{

                                booking_status = "Available"; border_color = "border-success"; booking_detail_link = "#";
                            }

                            json_data += '<div class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15 m-1 '+ border_color +' ">'+
                                    '<a href="' + booking_detail_link + '"><div class="text-center">'+
                                        '<h2>'+ val.id +'</h2>'+
                                        '<p>'+ val.room_cat +'<br>'+ booking_status +'</p>'+
                                    '</div></a>'+
                                '</div>';

                                $("#msg").empty().append(json_data);

                        });
                    }
                    else{

                            booking_status = "Available"; border_color = "border-success"; booking_detail_link = "#";

                            json_data += '<div class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15 m-1 '+ border_color +' ">'+
                                '<a href="' + booking_detail_link + '"><div class="text-center">'+
                                    '<h2>'+ val.id +'</h2>'+
                                    '<p>'+ val.room_cat +'<br>'+ booking_status +'</p>'+
                                '</div></a>'+
                            '</div>';

                            $("#msg").empty().append(json_data);

                        }

                });

            }
          }
       });

    }
</script>



@endsection
