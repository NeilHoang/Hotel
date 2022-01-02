@extends('layout.admin.admin')
@section('page-heading','Room Type')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('roomtype.create')}}" class="float-right btn btn-outline-success btn-sm">Add New</a>
        </div>
        <div class="card-body">
            @if(session()->has('message'))
                <div class="text-success">
                    {{ session()->get('message') }}
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Gallery Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Gallery Image</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($rooms as $key => $room)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$room->title}}</td>
                                    <td>{{$room->price}}</td>
                                    <td>{{count($room->roomtypeimages)}}</td>
                                    <td>
                                        <a href="{{route('roomtype.show',$room->id)}}" class="btn btn-info btn-sm"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="{{route('roomtype.edit',$room->id)}}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{route('roomtype.destroy',$room->id)}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('bạn có chắc chắn muốn xóa không ?')"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Data Available in table </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    {{ $rooms->links() }}
@endsection




