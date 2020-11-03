@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">{{$data->hotel_name}}</h4>
                <p class="card-category">{{$data->hotel_email}}</p>
                </div>
                <div class="card-body">
                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                        <input placeholder="Select date" type="text" id="example" class="form-control">
                        <label for="example">Try me...</label>
                        <i class="fas fa-calendar input-prefix" tabindex=0></i>
                    </div>

                        @if(!$data->rooms->isEmpty())
                            <div id = 'msg' class="row mw-100">
                                @foreach($data->rooms as $row)
                                    <div id="room_data" class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15">
                                        {{$row->id}}
                                    </div>
                                @endforeach
                            </div>
                            <form>
                                <button type="button" rel="tooltip" title="Add Rooms" onclick="getMessage()" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">add</i> Replace Message
                                </button>
                            </form>
                            {{-- <button type="button" rel="tooltip" title="Add Rooms" onclick="location.href='{{ url('/hotel') }}/{{ $data->id.'/addRoom'}}'" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">add</i> Add More Rooms
                            </button> --}}

                        @else
                            <h4 class="title">No rooms found</h4>
                            {{-- <span>
                            <button type="button" rel="tooltip" title="Add Rooms" onclick="location.href='{{ url('/hotel') }}/{{ $data->id.'/addRoom'}}'" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">add</i> Add Rooms
                                </button>
                            </span> --}}
                        @endif

                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                <a href="javascript:;">
                    <img class="img" src="{{$data->hotel_image}}" />
                </a>
                </div>
                <div class="card-body">
                <h6 class="card-category text-gray">{{$data->hotel_location}}</h6>
                <h4 class="card-title">{{$data->hotel_name}}</h4>
                <p class="card-description">
                    {{$data->description}}
                </p>
                <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    {{-- <div id = 'msg' class="row mw-100">@foreach($data->rooms as $row)
        <div id="room_data" class="col-lg-3 col-md-6 col-sm-6 border border-success rounded mw-15">
            {{$row->id}}
        </div>
    @endforeach</div>
        <form>
            <button type="button" rel="tooltip" title="Add Rooms" onclick="getMessage()" class="btn btn-primary btn-link btn-sm">
                <i class="material-icons">add</i> Replace Message
            </button>
        </form> --}}

    <script>
        function getMessage() {
            // alert("function call");
           $.ajax({
              type:'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              url:'/getmsg',
              data:'_token = <?php echo csrf_token() ?>',
              success:function(data) {
                  if(data){
                    var json_data="";
                    console.log(data[0].id);
                    jQuery.each(data, function(i, val) {
                        json_data += '<div id="room_data" class="col-lg-3 col-md-6 col-sm-6 border border-success  rounded mw-15">'+val.id+'</div>';

                    });
                    $("#msg").empty().append(json_data);
                }
              }
           });
        }
     </script>
@endsection
