@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Bookings List</h4>
                {{-- <p class="card-category">Current working staff details</p> --}}
              </div>
              <div class="card-body">
                <div class="table-responsive">

                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Booking Name
                        </th>
                        <th>
                            Hotel
                        </th>
                        <th>
                            Room
                        </th>
                        <th>
                            From
                        </th>
                        <th>
                            To
                        </th>
                        <th>
                            Days
                        </th>
                        <th>
                            Status
                        </th>
                        </thead>
                         <tbody>
                        @foreach($data as $row)

                            <tr>
                                <td>
                                    {{ $row->id  }}
                                </td>
                                <td>
                                    {{ $row->booking_name }}
                                </td>
                                <td>
                                    {{ $row->hotel_lists_id  }}
                                </td>
                                <td>
                                    {{ $row->room_lists_id  }}
                                </td>
                                <td>
                                    {{ $row->Booking_date_from  }}
                                </td>
                                <td>
                                    {{ $row->Booking_date_to  }}
                                </td>
                                <td>
                                    {{ $row->Booking_num_of_days  }}
                                </td>
                                <td>
                                    @if ($row->booking_status =='Cancelled')
                                        <span style="color:red">{{$row->booking_status}}</span>
                                    @else
                                        {{$row->booking_status}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>

    </div>

@endsection
