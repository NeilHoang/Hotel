@extends('layout.admin.admin')
@section('page-heading','Edit Service ')
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
                <form method="POST" action="{{route('service.update',$services->id)}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title <span class="text-danger">*</span></th>
                            <td><input name="title" type="text" class="form-control" value="{{$services->title}}"></td>
                        </tr>
                        <tr>
                            <th>Small Description <span class="text-danger">*</span></th>
                            <td><input name="small_desc" type="text" class="form-control" value="{{$services->small_desc}}"></td>
                        </tr>
                        <tr>
                            <th>Detail Description <span class="text-danger">*</span></th>
                            <td><input name="detail_desc" type="text" class="form-control" value="{{$services->detail_desc}}"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input name="prev_photo" type="hidden"  value="{{$services->photo}}"/>
                                <input name="photo" type="file" />
                                <img src="{{asset("upload/imageService/".$services->photo)}}"
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




