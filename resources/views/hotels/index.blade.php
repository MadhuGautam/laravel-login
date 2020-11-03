@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Hotel List</h4>
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
                        Name
                      </th>
                      <th>
                        Rooms
                      </th>
                      <th>
                        Location
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        operations
                      </th>
                    </thead>
                    <tbody>
                        @foreach($data as $row)

                            <tr>
                                <td>
                                    {{ $row->id  }}
                                </td>
                                <td>
                                   <a href="{{ url('/hotel') }}/{{ $row->id  }}">{{ $row->hotel_name  }}</a>

                                </td>
                                <td>
                                    @if (count($row->rooms) >0)

                                       <p class="justify-content-center ml-4">{{ count($row->rooms)}}</p>
                                    @else
                                      <button type="button" rel="tooltip" title="Add Rooms" onclick="location.href='{{ url('/hotel') }}/{{ $row->id.'/addRoom' }}'" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">add</i>
                                      </button>
                                    @endif

                                </td>
                                <td>
                                    {{ $row->hotel_location  }}
                                </td>
                                <td>
                                    {{ $row->hotel_email  }}
                                </td>
                                <td class="text-primary">
                                    <button type="button" rel="tooltip" title="Edit Details" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                        <i class="material-icons">close</i>
                                    </button>
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
