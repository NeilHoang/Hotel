@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('staff.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{$staffs->name}}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <img class="image-size" width="100"
                                 src="{{asset("upload/imageStaff/".$staffs->photo)}}"
                                 alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{$staffs->department->title}}</td>
                    </tr>

                    <tr>
                        <th>Bio</th>
                        <td>{{$staffs->bio}}</td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>{{$staffs->salary_type}}</td>
                    </tr>
                    <tr>
                        <th>Salary Amount</th>
                        <td>{{$staffs->salary_amount}}</td>
                    </tr>

                </table>

                </td>
                </tr>

                </table>
            </div>
        </div>
    </div>
@endsection




