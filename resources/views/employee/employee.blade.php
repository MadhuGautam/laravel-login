@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Employee List</h4>
                <p class="card-category">Current working staff details</p>
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
                        Assigned Hotel
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Operations
                      </th>
                    </thead>
                    <tbody>

                        @foreach($data as $row)

                            <tr>
                                <td>
                                    {{ $row->id  }}
                                </td>
                                <td>
                                    {{ $row->name  }}
                                </td>
                                <td>
                                    {{ $row->hotel_lists_id }}
                                </td>
                                <td>
                                    {{ $row->email }}
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
