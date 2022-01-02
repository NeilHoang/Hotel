@extends('layout.admin.admin')
@section('page-heading','Service')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('service.create')}}" class="float-right btn btn-outline-success btn-sm">Add New</a>
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
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if($services)
                                @forelse($services as $key => $service)
                                <tr style="text-align: center;vertical-align: middle">
                                    <td>{{++$key}}</td>
                                    <td>{{$service->title}}</td>
                                    <td class="image-servicer">
                                        <img
                                            src="{{asset('upload/imageService/'.$service->photo)}}"
                                            class="image-size" alt=""
                                            width="100">
                                    </td>
                                    <td>
                                        <a href="{{route('service.show',$service->id)}}"
                                           class="btn btn-info btn-sm"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="{{route('service.edit',$service->id)}}"
                                           class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{route('service.destroy',$service->id)}}"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure to DELETE this data ?')"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                @empty
                                    <tr>
                                        <td>No Data Available in table</td>
                                    </tr>
                                @endforelse
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    {{$services->links()}}
@endsection




