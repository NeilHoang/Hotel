@extends('layout.admin.admin')
@section('page-heading','Add Staff ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('staff.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{route('staff.update',$staffs->id)}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td><input name="name" type="text" class="form-control" value="{{$staffs->name}}"></td>
                        </tr>
                        <tr>
                            <th>Select Department</th>
                            <td>
                                <select name="department_id" class="form-control">
                                    @foreach($departs as $depart)
                                        <option @if($staffs->department_id ==$depart->id) selected
                                                @endif value="{{$depart->id}}">{{$depart->title}}</option>
                                    @endforeach
                                    <option value="0">--- Select ---</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>
                                <textarea name="bio" class="form-control">{{$staffs->bio}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input @if($staffs->salary_type == 'daily') checked
                                       @endif name="salary_type" type="radio" value="daily"> Daily
                                <input @if($staffs->salary_type == 'monthly') checked
                                       @endif name="salary_type" type="radio" value="monthly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td>
                                <input name="salary_amount" type="number" class="form-control"
                                       value="{{$staffs->salary_amount}}">
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input name="photo" type="file"/>
                                <input type="hidden" name="prev_photo" value="{{$staffs->photo}}"/>
                                <img src="{{asset("/upload/imageStaff/".$staffs->photo)}}"
                                     width="100px" height="100px"><br><br>
                            </td>
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




