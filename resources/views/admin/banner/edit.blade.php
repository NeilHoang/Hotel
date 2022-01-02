@extends('layout.admin.admin')
@section('page-heading','Update Banner ')
@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Banner
                    <a href="{{route('banner.index')}}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>
            <div class="card-body">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                @endif

                @if(\Illuminate\Support\Facades\Session::has('msg'))
                    <p class="text-success">{{session('msg')}}</p>
                @endif
                <div class="table-responsive">
                    <form method="post" enctype="multipart/form-data" action="{{route('banner.update',$banners->id)}}">
                        @csrf
                        <table class="table table-bordered" >
                            <tr>
                                <th>Banner Image<span class="text-danger">*</span></th>
                                <td>
                                    <input name="banner_src" type="file" />
                                    <input type="hidden" name="prev_photo" value="{{$banners->banner_src}}" />
                                    <img width="100" src="{{asset('upload/imageBanner/'.$banners->banner_src)}}" />
                                </td>
                            </tr>
                            <tr>
                                <th>Alt Text <span class="text-danger">*</span></th>
                                <td><input value="{{$banners->alt_text}}" name="alt_text" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Publish Status<span class="text-danger">*</span></th>
                                <td><input @if($banners->publish_status=='on') checked @endif name="publish_status" type="checkbox" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection




