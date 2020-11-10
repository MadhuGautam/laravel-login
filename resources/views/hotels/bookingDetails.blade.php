@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        @if($data[1])
                            <div class="card-header card-header-primary">

                                <h4 class="card-title">{{$data[1]->hotel_lists_id}}</h4>
                                <p class="card-category"></p>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">

                                        <tbody>
                                            <tr>
                                                <th colspan=2 style="border:0"><h2>Room Details</h2></th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Room ID
                                                </td>
                                                <td>
                                                    {{ $data[1]->id }}

                                                </td>
                                                <td>
                                                    Room Category
                                                </td>
                                                <td>
                                                    {{ $data[1]->room_cat }}

                                                </td>
                                            </tr>
                                            @if (count($data[1]->bookings) >0)
                                                @foreach($data[1]->bookings as $book)
                                                    <tr>
                                                        <td>
                                                            Booking Name
                                                        </td>
                                                        <td>
                                                        {{ $book->booking_name  }}

                                                        </td>

                                                        <td>
                                                            Room Price
                                                        </td>
                                                        <td>
                                                        {{ $book->room_price  }}

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Booking for Total number of days
                                                        </td>
                                                        <td>
                                                        {{ $book->Booking_num_of_days  }}

                                                        </td>

                                                        <td>
                                                            Booking Date
                                                        </td>
                                                        <td>
                                                            From :
                                                                {{ $book->Booking_date_from  }} <br>

                                                            To :

                                                                {{ $book->Booking_date_to  }}

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Booking Amount Charged
                                                        </td>
                                                        <td>
                                                            {{ $book->charged_booking_amount  }}

                                                        </td>

                                                        <td>
                                                            Total Amount
                                                        </td>
                                                        <td>
                                                            {{ $book->Total_room_amount  }}

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Received Amount
                                                        </td>
                                                        <td>
                                                            {{ $book->Total_paid_amount  }}

                                                        </td>

                                                        <td>
                                                            Payment Mode
                                                        </td>
                                                        <td>
                                                            {{ $book->Payment_mode  }}

                                                        </td>

                                                    </tr>

                                                @endforeach
                                                @if($data[0])
                                                    <tr class="mt-10">
                                                        <th colspan=2 style="border:0"><h2>Quest Details</h2></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Name
                                                        </td>
                                                        <td>
                                                            {{ $data[0]->quest_name  }}

                                                        </td>

                                                        <td>
                                                            Contact
                                                        </td>
                                                        <td>
                                                            {{ $data[0]->quest_contact  }}

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Image
                                                        </td>
                                                        <td>
                                                            {{ $data[0]->quest_image  }}

                                                        </td>

                                                        <td>
                                                            From
                                                        </td>
                                                        <td>
                                                            {{ $data[0]->quest_from  }}

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Purpose
                                                        </td>
                                                        <td>
                                                            {{ $data[0]->purpose  }}

                                                        </td>

                                                        <td>
                                                            Number of persons
                                                        </td>
                                                        <td>
                                                            {{ $data[0]->num_of_person  }}

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Checkin Date and Time
                                                        </td>
                                                        <td>
                                                            From :
                                                                {{ $data[0]->checkin_datetime  }} <br>

                                                            To :

                                                                {{ $data[0]->checkout_datetime  }}

                                                        </td>

                                                        <td>
                                                            Description
                                                        </td>
                                                        <td>
                                                            {{ $data[0]->description  }}

                                                        </td>

                                                    </tr>
                                                @endif
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
