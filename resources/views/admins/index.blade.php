@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" >Hotels</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
                    <p class="card-text">number of hotels: {{\App\Models\Hotel\Hotel::count()}}</p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rooms</h5>

                    <p class="card-text">number of rooms: {{\App\Models\Apartment\Apartment::count()}}</p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>

                    <p class="card-text">number of admins: {{\App\Models\Admin\Admin::count()}}</p>

                </div>
            </div>
        </div>
    </div>

@endsection
