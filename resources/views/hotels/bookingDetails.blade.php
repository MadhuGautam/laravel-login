@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            @foreach($data as $row)
                                <h4 class="card-title">{{$row->hotel_lists_id}}</h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table">

                                            <tbody>

                                                <tr>
                                                    <td>
                                                        Room ID
                                                    </td>
                                                    <td>
                                                    {{ $row->id  }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Room Category
                                                    </td>
                                                    <td>
                                                    {{ $row->room_cat  }}

                                                    </td>
                                                </tr>
                                                @if (count($row->bookings) >0)
                                                    @foreach($row->bookings as $book)
                                                        <tr>
                                                            <td>
                                                                Booking Name
                                                            </td>
                                                            <td>
                                                            {{ $book->booking_name  }}

                                                            </td>

                                                        </tr>
                                                        <tr>
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

                                                        </tr>
                                                        <tr>
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

                                                        </tr>
                                                        <tr>
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

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Payment Mode
                                                            </td>
                                                            <td>
                                                                {{ $book->Payment_mode  }}

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Booking From
                                                            </td>
                                                            <td>
                                                                {{ $book->booking_from  }}

                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endif


                            @endforeach

                                    </tbody>
                              </table>
                            </div>
                          </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
