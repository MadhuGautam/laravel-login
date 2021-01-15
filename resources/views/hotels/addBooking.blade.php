@extends('layouts.dashboard')
{{$hotel}}
@section('content')
    <div class="content">
        <div class="container-fluid">
            @foreach ($hotel as $item)

                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header card-header-primary">

                                <h4 class="card-title">{{ $item->hotel_name }}</h4>

                            </div>
                            <div class="card-body">

                                @if (count($errors) > 0)
                                    <div class = "alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <form action="#" method="POST">
                                        @csrf
                                        <input type="hidden" id="hotel_id" name="hotel_id" value="{{ $item->hotel_lists_id }}">
                                        <table class="table" cellspacing=13 cellpadding=10>

                                            <tbody>
                                                <tr>
                                                    <th colspan=4 style="border:0"><h2>Room Details</h2></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Room ID
                                                    </td>
                                                    <td>
                                                        <input type="text" id="roomId" name="roomId" class="form-control" value="{{ $item->id }}" readonly="readonly" required>

                                                    </td>
                                                    <td>
                                                        Room Category
                                                    </td>
                                                    <td>
                                                        <input type="text" id="roomCat" name="roomCat" class="form-control" value="{{ $item->room_cat }}" readonly="readonly" required>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        Booking Name
                                                    </td>
                                                    <td>
                                                        <input type="text" id="bookingName" name="bookingName" class="form-control" required>
                                                    </td>

                                                    <td>
                                                        Room Price
                                                    </td>
                                                    <td>
                                                        <input type="text" id="roomPrice" name="roomPrice" class="form-control" value="{{ $item->room_price }}" readonly="readonly" required>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>
                                                        Booking Date
                                                    </td>
                                                    <td>
                                                        From :

                                                        <input type="date" id="bookdatefrom" name="bookdatefrom" class="form-control" value="{{ date('Y-m-d') }}" onchange="countdays()" min="0" required>
                                                    </td>
                                                    <td>
                                                        To :

                                                            <input type="date" id="bookdateto" name="bookdateto" class="form-control" value="{{ date('Y-m-d') }}" onchange="countdays()" required>

                                                    </td>
                                                    <td>
                                                        Total days:
                                                        <input type="text" id="BookingDays" name="BookingDays" class="form-control" readonly="readonly" required>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Booking Amount Charged
                                                    </td>
                                                    <td>
                                                        <input type="number" id="bookedAmount" name="bookedAmount" class="form-control" onchange="calculateAmount()" required>

                                                    </td>

                                                    <td>
                                                        Total Amount
                                                    </td>
                                                    <td>
                                                        <input type="number" id="bookTotalAmount" name="bookTotalAmount" class="form-control" readonly="readonly" required>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Discount
                                                    </td>
                                                    <td>
                                                        <input type="number" id="discount" name="discount" class="form-control" required>

                                                    </td>

                                                    <td>
                                                        Payment Mode
                                                    </td>
                                                    <td>
                                                        <input type="text" id="paymentMode" name="paymentMode" class="form-control" required>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Total Recieved Amount
                                                    </td>
                                                    <td>

                                                        <input type="number" id="totalRecievedAmount" name="totalRecievedAmount" class="form-control" readonly="readonly" required>

                                                    </td>

                                                    <td>
                                                        Booking From
                                                    </td>
                                                    <td>
                                                        <input type="text" id="bookingFrom" name="bookingFrom" class="form-control" required>

                                                    </td>

                                                </tr>


                                                <tr class="mt-10">
                                                    <th colspan=4 style="border:0"><h2>Quest Details</h2></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Name
                                                    </td>
                                                    <td>
                                                        <input type="text" id="questName" name="questName" class="form-control" required>

                                                    </td>

                                                    <td>
                                                        Contact
                                                    </td>
                                                    <td>
                                                        <input type="number" id="questContact" name="questContact" class="form-control" required>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Image
                                                    </td>
                                                    <td>
                                                        <input type="file" id="questimage" name="questimage" class="form-control" required>

                                                    </td>

                                                    <td>
                                                        Location
                                                    </td>
                                                    <td>

                                                        <input type="text" id="questfrom" name="questfrom" class="form-control" required>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Purpose of Visit
                                                    </td>
                                                    <td>
                                                        <input type="text" id="visitPurpose" name="visitPurpose" class="form-control" required>

                                                    </td>

                                                    <td>
                                                        Number of persons
                                                    </td>
                                                    <td>

                                                        <input type="number" id="num_of_persons" name="num_of_persons" class="form-control" min="1" max="5" value="1" required>
                                                    </td>

                                                </tr>
                                                {{-- <tr>
                                                    <td>
                                                        Checkin Date and Time
                                                    </td>

                                                    <td>
                                                        From :<input type="date" id="checkInDate" name="checkInDate" class="form-control">
                                                    </td>
                                                    <td>
                                                        To : <input type="date" id="checkOutDate" name="checkOutDate" class="form-control">
                                                    </td>
                                                    <td>
                                                        Total days:
                                                        <input type="text" id="days" name="days"class="form-control">

                                                    </td>
                                                </tr> --}}
                                                <tr>
                                                    <td>
                                                        Description
                                                    </td>
                                                    <td colspan="4">
                                                        <textarea class="form-control" name="description" rows="5"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <button type="submit" class="btn btn-primary pull-right">Book</button>
                                                        <div class="clearfix"></div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        window.onload = function() {
            countdays();


        };

        function countdays()
        {

            var bookdatefrom = document.getElementById('bookdatefrom').value;
            var bookdateto = document.getElementById('bookdateto').value;
            var roomPrice = document.getElementById('roomPrice').value;

            var date1 = new Date(bookdatefrom);
            var date2 = new Date(bookdateto);

            var Difference_In_Time = date2.getTime() - date1.getTime();
            var Difference_In_Days = (Difference_In_Time / (1000 * 3600 * 24))+1;
            //document.write("Total number of days between dates  <br>" + Difference_In_Days);
            document.getElementById('BookingDays').value=Difference_In_Days;
            document.getElementById('bookTotalAmount').value= roomPrice * Difference_In_Days;

        }

        function calculateAmount(){

            document.getElementById('totalRecievedAmount').value = document.getElementById('bookedAmount').value;
            document.getElementById('bookedAmount').max = document.getElementById('bookTotalAmount').value;

        }
    </script>
@endsection
