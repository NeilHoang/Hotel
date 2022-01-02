@extends('layout.admin.admin')
@section('page-heading','Department')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('department.create')}}" class="float-right btn btn-outline-success btn-sm">Add New</a>
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
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($departments) == 0)
                                <tr>
                                    <td colspan="4">No data in table</td>
                                </tr>
                            @else
                                @foreach($departments as $key => $department)
                                    <tr style="text-align: center;vertical-align: middle">
                                        <td>{{++$key}}</td>
                                        <td>{{$department->title}}</td>
                                        <td>{{$department->detail}}</td>
                                        <td>
                                            <a href="{{route('department.show',$department->id)}}"
                                               class="btn btn-info btn-sm"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{route('department.edit',$department->id)}}"
                                               class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{route('department.destroy',$department->id)}}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure to DELETE this data ?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    {{ $departments->links() }}
@endsection




