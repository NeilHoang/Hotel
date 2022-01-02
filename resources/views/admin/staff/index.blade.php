@extends('layout.admin.admin')
@section('page-heading','Staff')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('staff.create')}}" class="float-right btn btn-outline-success btn-sm">Add New</a>
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
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($staffs as $key => $staff)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td><img class="image-size" width="100"
                                             src="{{asset("upload/imageStaff/".$staff->photo)}}"
                                             alt=""></td>
                                    <td>{{$staff->department->title}}</td>
                                    <td>
                                        <a href="{{route('staff.show',$staff->id)}}" class="btn btn-info btn-sm"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="{{route('staff.edit',$staff->id)}}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{route('staff.all_payment',$staff->id)}}" class="btn btn-info btn-sm"><i
                                                class="fa fa-credit-card"></i></a>
                                        <a href="{{route('staff.destroy',$staff->id)}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure to DELETE this data ?')"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Data Available in table</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    {{ $staffs->links() }}
@endsection




