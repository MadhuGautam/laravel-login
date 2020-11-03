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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
