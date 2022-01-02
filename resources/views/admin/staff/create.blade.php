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
                <form method="POST" action="{{route('staff.store')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td><input name="name" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Select Department</th>
                            <td>
                                <select name="department_id" class="form-control">
                                    <option value="0">-- Select ---</option>
                                    @foreach($departs as $key => $depart)
                                        <option value="{{$depart->id}}">{{$depart->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>
                                <textarea name="bio" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input name="salary_type" type="radio" value="daily"> Daily
                                <input name="salary_type" type="radio" value="monthly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td>
                                <input name="salary_amount" type="number" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input name="photo" type="file"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

@endsection




