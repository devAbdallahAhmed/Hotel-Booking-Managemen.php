@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="container">
        @if(session()->has('update'))
            <div class="alert alert-success">
                {{session()->get('update')}}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
                    <form method="POST" action="{{route('update.hotel',$update->id)}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" value="{{$update->name}}" class="form-control" placeholder="name" />

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control"  name="description"   id="exampleFormControlTextarea1" rows="3">{{$update->description}}</textarea>
                        </div>

                        <div class="form-outline mb-4 mt-4">
                            <label for="exampleFormControlTextarea1">Location</label>

                            <input type="text" name="location"  value="{{$update->location}}" id="form2Example1" class="form-control"/>

                        </div>


                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
