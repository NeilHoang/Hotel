@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('roomtype.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{$rooms->title}}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{$rooms->price}}</td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td>{{$rooms->detail}}</td>
                    </tr>
                    <tr>
                        <th>Gallery Images</th>
                        <td>
                            <table class="table table-bordered mt-3">
                                    @foreach($rooms->roomtypeimages as $image)
                                        <td style="text-align: center" class="imgcol{{$image->id}}">
                                            <img src="{{asset("/storage/".$image->image_src)}}"
                                                 width="100px" height="100px">
                                            <p class="mt-2" style="text-align: center">
                                            </p>
                                        </td>
                                    @endforeach
                            </table>

                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection




