@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif
                    </div>
                    <div class="container">
                        @if(session()->has('update'))
                            <div class="alert alert-success">
                                {{session()->get('update')}}
                            </div>
                        @endif

                            @if(session()->has('delete'))
                                <div class="alert alert-danger">
                                    {{session()->get('delete')}}
                                </div>
                            @endif
                    </div>


                    <h5 class="card-title mb-4 d-inline">Hotels</h5>
                    <a  href="{{route('create.hotel')}}" class="btn btn-primary mb-4 text-center float-right">Create Hotels</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="2" >#</th>
                            <th scope="col">name</th>
                            <th scope="col">location</th>
                            <th scope="col">description</th>
                            <th scope="col">update</th>
                            <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($AllHotel as $all)
                        <tr>
                            <th scope="row">{{$all->id}}</th>
                            <td>{{$all->name}}</td>
                            <td>{{$all->location}}</td>
                            <td>{{$all->description}}</td>
                            <td><a  href="{{route('view.hotel',$all->id)}}" class="btn btn-warning text-white text-center ">Update </a></td>
                            <td><a href="{{route('delete.hotel',$all->id)}}" class="btn btn-danger  text-center ">Delete </a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
