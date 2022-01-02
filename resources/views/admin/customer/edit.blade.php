@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('customer.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
{{--            @if($errors->any())--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <p class="text-danger">{{$error}}</p>--}}
{{--                @endforeach--}}
{{--            @endif--}}
            <div class="table-responsive">
                <form method="POST" action="{{route('customer.update',$customers->id)}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Name <span class="text-danger">*</span></th>
                            <td><input name="name" type="text" class="form-control" value="{{$customers->name}}"></td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input name="email" type="text" class="form-control" value="{{$customers->email}}"></td>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <td><input name="mobile" type="text" class="form-control" value="{{$customers->mobile}}">
                            </td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input name="password" type="password" class="form-control"
                                       value="{{$customers->password}}"></td>
                        </tr>
                        <tr>
                            <th>Address  <span class="text-danger">*</span></th>
                            <td><textarea name="address" class="form-control">{{$customers->address}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input name="photo" type="file" />
                                <input type="hidden" name="prev_photo" value="{{$customers->photo}}" />
                                <img src="{{asset("upload/imageCustomer/".$customers->photo)}}"
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




