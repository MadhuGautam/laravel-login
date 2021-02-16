@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        @if($data)
                            @foreach($hotel as $hotelData)
                                <div class="card-header card-header-primary">

                                    <h4 class="card-title">Hotel - {{$hotelData->hotel_name}}</h4>
                                    <p class="card-category"></p>

                                </div>
                            @endforeach
                            @foreach($data as $bookdata)
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">

                                            <tbody>
                                                <tr>
                                                    <th colspan=2 style="border:0"><h2>Booking Details</h2></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Booking ID
                                                    </td>
                                                    <td>
                                                        {{ $bookdata->id }}

                                                    </td>
                                                    @if($room)
                                                        <td>
                                                            Room Category
                                                        </td>

                                                        <td>
                                                            @foreach($room as $roomData)
                                                                {{ $roomData->room_cat }}
                                                            @endforeach
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Booking Name
                                                    </td>
                                                    <td>
                                                    {{ $bookdata->booking_name  }}

                                                    </td>

                                                    <td>
                                                        Room Price
                                                    </td>
                                                    <td>
                                                        {{ $bookdata->room_price  }}

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Booking for Total number of days
                                                    </td>
                                                    <td>
                                                        {{ $bookdata->Booking_num_of_days }}

                                                    </td>

                                                    <td>
                                                        Booking Date
                                                    </td>
                                                    <td>
                                                        From :
                                                            {{ $bookdata->Booking_date_from  }} <br>

                                                        To :

                                                            {{ $bookdata->Booking_date_to  }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Booking Amount Charged
                                                    </td>
                                                    <td>
                                                        {{ $bookdata->charged_booking_amount  }}

                                                    </td>

                                                    <td>
                                                        Total Amount
                                                    </td>
                                                    <td>
                                                        {{ $bookdata->Total_room_amount  }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Total Received Amount
                                                    </td>
                                                    <td>
                                                        {{ $bookdata->Total_paid_amount  }}

                                                    </td>

                                                    <td>
                                                        Payment Mode
                                                    </td>
                                                    <td>
                                                        {{ $bookdata->Payment_mode  }}

                                                    </td>
                                                </tr>

                                                @if($quest)
                                                    @foreach($quest as $data)
                                                        <tr class="mt-10">
                                                            <th colspan=2 style="border:0"><h2>Quest Details</h2></th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Name
                                                            </td>
                                                            <td>
                                                                {{ $data->quest_name  }}
                                                            </td>
                                                            <td>
                                                                Contact
                                                            </td>
                                                            <td>
                                                                {{ $data->quest_contact  }}

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Image
                                                            </td>
                                                            <td>
                                                                {{ $data->quest_image  }}

                                                            </td>

                                                            <td>
                                                                From
                                                            </td>
                                                            <td>
                                                                {{ $data->quest_from  }}

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Purpose
                                                            </td>
                                                            <td>
                                                                {{ $data->purpose  }}

                                                            </td>

                                                            <td>
                                                                Number of persons
                                                            </td>
                                                            <td>
                                                                {{ $data->num_of_person  }}

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Checkin Date and Time
                                                            </td>
                                                            <td>
                                                                From :
                                                                    {{ $data->checkin_datetime  }} <br>

                                                                To :

                                                                    {{ $data->checkout_datetime  }}

                                                            </td>

                                                            <td>
                                                                Description
                                                            </td>
                                                            <td>
                                                                {{ $data->description  }}

                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endif
                                                {{-- @endif --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach

                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
