@extends('layout.admin.admin')
@section('page-heading','Add Service ')
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
                <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title <span class="text-danger">*</span></th>
                            <td><input name="title" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Small Description <span class="text-danger">*</span></th>
                            <td><input name="small_desc" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Detail Description <span class="text-danger">*</span></th>
                            <td><input name="detail_desc" type="text" class="form-control"></td>
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




