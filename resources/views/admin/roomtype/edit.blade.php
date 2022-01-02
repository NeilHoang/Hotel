@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('roomtype.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{route('roomtype.update',$rooms->id)}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input value="{{$rooms->title}}" name="title" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input value="{{$rooms->price}}" name="price" type="number" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" class="form-control">{{$rooms->detail}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Gallery Images</th>
                            <td>
                                <table class="table table-bordered mt-3">
{{--                                    <p style="color: red">Note! This is images not update but you can delete !!!</p>--}}
                                    <tr>
                                        <input type="file" multiple name="images[]"/>
                                        @foreach($rooms->roomtypeimages as $image)
                                            <td style="text-align: center" class="imgcol{{$image->id}}">
                                                <img src="{{asset("/storage/".$image->image_src)}}"
                                                     width="100px" height="100px">
                                                <p class="mt-2" style="text-align: center">
                                                    <button
                                                        onclick="return confirm('Are yo sure you want to DELETE this image?')"
                                                        data-image-id="{{$image->id}}"
                                                        class="btn btn-danger btn-sm delete-image"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                </p>
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".delete-image").on('click', function () {
                var _img_id = $(this).attr('data-image-id');
                var _vm = $(this);
                $.ajax({
                    url: "{{url('admin/roomtypeimage/destroyImage')}}/" + _img_id,
                    dataType: 'json',
                    beforeSend: function () {
                        _vm.addClass('disabled');
                    },
                    success: function (res) {
                        if (res.bool == true) {
                            $(".imgcol" + _img_id).remove();
                        }
                        _vm.removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endsection

@endsection




