@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Hotel List</h4>
                {{-- <p class="card-category">Current working staff details</p> --}}
            </div>
                {{$data[1]}}
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" id="hotel_id" name="hotel_id" value="{{ $data[1]->hotel_lists_id }}">
                    <input type="text" id="hotel_name" name="hotel_name" class="form-control" value="{{ $data[1]->hotel_name }}" readonly="readonly" required>
                    <input type="text" id="hotel_image" name="hotel_image" class="form-control" value="{{ $data[1]->hotel_image }}" readonly="readonly" required>
                    <input type="text" id="hotel_email" name="hotel_email" class="form-control" value="{{ $data[1]->hotel_email }}" readonly="readonly" required>
                    <input type="text" id="hotel_owner" name="hotel_owner" class="form-control" value="{{ $data[1]->hotel_owner }}" readonly="readonly" required>
                    <input type="text" id="no_of_rooms" name="no_of_rooms" class="form-control" value="{{ $data[1]->no_of_rooms }}" readonly="readonly" required>
                    <input type="text" id="description" name="description" class="form-control" value="{{ $data[1]->description }}" readonly="readonly" required>
                    @if (count($data[1]->rooms) >0)

                    <p class="justify-content-center ml-4">{{ count($data[1]->rooms)}}</p>
                 @else
                    No Room Added
                 @endif
                </form>
            </div>
        </div>
    </div>

@endsection
