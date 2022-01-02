@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('room.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{$rooms->title}}</td>
                    </tr>
                    <tr>
                        <th>Room Type</th>
                        <td>{{$rooms->RoomType->title}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

@endsection




