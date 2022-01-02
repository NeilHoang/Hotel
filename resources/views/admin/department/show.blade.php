@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('department.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tfoot>
                    <tr style="text-align: center;vertical-align: middle">
                        <th>STT</th>
                        <th>Title</th>
                        <th>Detail</th>
                    </tr>
                    </tfoot>
                    <tbody style="text-align: center;vertical-align: middle">
                    <td>{{$departments->id}}</td>
                    <td>{{$departments->title}}</td>
                    <td>{{$departments->detail}}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




