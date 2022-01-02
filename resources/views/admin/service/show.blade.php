@extends('layout.admin.admin')
@section('page-heading','Show Service ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('service.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  style="text-align: center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Small Description</th>
                        <th>Detail Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Small Description</th>
                        <th>Detail Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody style="text-align: center;vertical-align: middle">
                    <td style="text-align: center;vertical-align: middle">{{$services->id}}</td>
                    <td style="text-align: center;vertical-align: middle" class="image-service">
                        <img
                            src="{{asset('upload/imageService/'.$services->photo)}}" class="image-size" alt=""
                            width="100">
                    </td>
                    <td>{{$services->title}}</td>
                    <td>{{$services->small_desc}}</td>
                    <td>{{$services->detail_desc}}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




