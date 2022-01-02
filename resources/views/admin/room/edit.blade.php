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
                <form method="POST" action="{{route('room.update',$rooms->id)}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Room Type</th>
                            <td>
                                <select name="room_type" class="form-control">
                                    <option value="0">-- Select ---</option>
                                    @foreach($roomtypes as $key => $roomtype)
                                        <option
                                            @if($rooms->room_type_id == $roomtype->id) selected @endif value="{{$roomtype->id}}">{{$roomtype->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><input value="{{$rooms->title}}" name="title" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection




