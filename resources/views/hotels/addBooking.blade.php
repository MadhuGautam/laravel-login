@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">

                            <h4 class="card-title">{{ $hotel[0]->hotel_name }}</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                                <input type="text" id="roomId" class="form-control">

                                            </td>
                                            <td>
                                                Room Category
                                            </td>
                                            <td>
                                                <input type="text" id="roomCat" class="form-control">

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Booking Name
                                            </td>
                                            <td>
                                                <input type="text" id="bookingName" class="form-control">
                                            </td>

                                            <td>
                                                Room Price
                                            </td>
                                            <td>
                                                <input type="text" id="roomPrice" class="form-control">
                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                Booking Date
                                            </td>
                                            <td>
                                                From :

                                                    <input type="date" id="bookdatefrom" class="form-control">
                                            </td>
                                            <td>
                                                To :

                                                    <input type="date" id="bookdateto" class="form-control">

                                            </td>
                                            <td>
                                                Total days:
                                                <input type="text" id="days" class="form-control">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Booking Amount Charged
                                            </td>
                                            <td>
                                                <input type="number" id="bookedAmount" class="form-control">

                                            </td>

                                            <td>
                                                Total Amount
                                            </td>
                                            <td>
                                                <input type="number" id="bookTotalAmount" class="form-control">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total Received Amount
                                            </td>
                                            <td>
                                                <input type="number" id="totalRecievedAmount" class="form-control">

                                            </td>

                                            <td>
                                                Payment Mode
                                            </td>
                                            <td>
                                                <input type="text" id="paymentMode" class="form-control">

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
                                                <input type="text" id="questName" class="form-control">

                                            </td>

                                            <td>
                                                Contact
                                            </td>
                                            <td>
                                                <input type="text" id="questContact" class="form-control">

                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Image
                                            </td>
                                            <td>
                                                <input type="text" id="questimage" class="form-control">

                                            </td>

                                            <td>
                                                Location
                                            </td>
                                            <td>

                                                <input type="text" id="questfrom" class="form-control">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Purpose of Visit
                                            </td>
                                            <td>
                                                <input type="text" id="visitPurpose" class="form-control">

                                            </td>

                                            <td>
                                                Number of persons
                                            </td>
                                            <td>

                                                <input type="number" id="num_of_persons" class="form-control" min="1" max="5">
                                            </td>

                                        </tr>
                                        {{-- <tr>
                                            <td>
                                                Checkin Date and Time
                                            </td>

                                            <td>
                                                From :<input type="date" id="checkInDate" class="form-control">
                                            </td>
                                            <td>
                                                To : <input type="date" id="checkOutDate" class="form-control">
                                            </td>
                                            <td>
                                                Total days:
                                                <input type="text" id="days" class="form-control">

                                            </td>
                                        </tr> --}}


                                    </tbody>
                                </table>
                                <form>
                                    {{-- <div class="row">
                                        <div class="col-md-3">

                                            <label>Checkin Date and Time</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="form-group">
                                            <label>From</label>
                                                <input type="date" id="checkInDate" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                            <label>To</label>
                                               <input type="date" id="checkOutDate" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                            <label>Total Days</label>
                                            <input type="number" id="totalDays" class="form-control">
                                            </div>

                                        </div>

                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div class="form-group">
                                            {{-- <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label> --}}
                                            <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Book</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
