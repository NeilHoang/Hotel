@extends('layout.admin.admin')
@section('page-heading','Add Customer ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('customer.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{route('customer.store')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Name <span class="text-danger">*</span></th>
                            <td><input name="name" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input name="email" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <td><input name="mobile" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input name="password" type="password" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Address <span class="text-danger">*</span></th>
                            <td><textarea name="address" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input name="photo" type="file"></td>
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




