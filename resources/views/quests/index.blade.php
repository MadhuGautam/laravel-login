@extends('layouts.dashboard')
{{$data}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

              <div class="card-header card-header-primary">
                <h4 class="card-title ">Customer List
                    <button type="button" rel="tooltip" title="Add new Hotel" class="btn btn-success btn-sm float-right" onclick="location.href='{{ url('/hotel/create') }}'">
                        <i class="material-icons">add</i>
                    </button>
                </h4>
                {{-- <p class="card-category">Current working staff details</p> --}}

              </div>
              <div class="card-body">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

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
                                    {{-- {{ $row->id  }} --}}
                                </td>
                                <td>
                                   {{-- <a href="{{ url('/hotel') }}/{{ $row->id  }}">{{ $row->hotel_name  }}</a> --}}

                                </td>
                                <td>
                                    {{-- @if (count($row->rooms) >0) --}}

                                       {{-- <p class="justify-content-center ml-4">{{ count($row->rooms)}}</p> --}}
                                    {{-- @else --}}
                                      {{-- <button type="button" rel="tooltip" title="Add Rooms" onclick="location.href='{{ url('/hotel') }}/{{ $row->id.'/add' }}'" class="btn btn-primary btn-link btn-sm"> --}}
                                        <button type="button" rel="tooltip" title="Add Rooms" onclick="location.href='{{ url('/hotel/create') }}'" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">add</i>
                                      </button>
                                    {{-- @endif --}}

                                </td>
                                <td>
                                    {{-- {{ $row->hotel_location  }} --}}
                                </td>
                                <td>
                                    {{-- {{ $row->hotel_email  }} --}}
                                </td>
                                <td class="text-primary">

                                            {{-- <button type="button" rel="tooltip" title="Edit Details" class="btn btn-primary btn-link btn-sm d-inline" onclick="location.href='{{ route('hotel.edit',[$row->id]) }}'">
                                                <i class="material-icons">edit</i>
                                            </button> --}}

                                            <form id="hotel-delete-form"  method="POST" action="{{ route('hotel.destroy',$row->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>

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
