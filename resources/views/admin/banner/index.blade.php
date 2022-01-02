@extends('layout.admin.admin')
@section('page-heading','Banner')
@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customers
                    <a href="{{route('banner.create')}}" class="float-right btn btn-success btn-sm">Add New</a>
                </h6>
            </div>
            <div class="card-body">
                @if(\Illuminate\Support\Facades\Session::has('msg'))
                    <p class="text-success">{{session('msg')}}</p>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Banner</th>
                            <th>Alt Text</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Banner</th>
                            <th>Alt Text</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($banners)
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{$banner->id}}</td>
                                    <td><img width="100" src="{{asset('upload/imageBanner/'.$banner->banner_src)}}"/>
                                    </td>
                                    <td>{{$banner->alt_text}}</td>
                                    <td>{{$banner->publish_status}}</td>
                                    <td>
                                        <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Are you sure to delete this data?')"
                                           href="{{route('banner.destroy',$banner->id)}}"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>@endsection




