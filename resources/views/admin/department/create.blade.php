@extends('layout.admin.admin')
@section('page-heading','Add Customer ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('department.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{route('department.store')}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title <span class="text-danger">*</span></th>
                            <td><input name="title" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Detail <span class="text-danger">*</span></th>
                            <td>
                                <textarea name="detail" class="form-control "></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection




