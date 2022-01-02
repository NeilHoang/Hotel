@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('department.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
{{--            @if($errors->any())--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <p class="text-danger">{{$error}}</p>--}}
{{--                @endforeach--}}
{{--            @endif--}}
            <div class="table-responsive">
                <form method="POST" action="{{route('department.update',$departments->id)}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title <span class="text-danger">*</span></th>
                            <td><input name="title" type="text" class="form-control" value="{{$departments->title}}"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td>
                                <textarea name="detail" class="form-control ">{{$departments->detail}}</textarea>
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




