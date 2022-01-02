@extends('layout.admin.admin')
@section('page-heading','Room')
@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Testimonials
                    @if(\Illuminate\Support\Facades\Session::has('msg'))
                        <p class="text-success">{{session('msg')}}</p>
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Testimonial</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Testimonial</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($testimonials)
                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>{{$testimonial->id}}</td>
                                    <td>{{$testimonial->test_cont}}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to delete this data?')" href="{{route('testimonial.delete',$testimonial->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection




