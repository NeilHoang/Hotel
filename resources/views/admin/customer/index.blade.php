@extends('layout.admin.admin')
@section('page-heading','Customers')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('customer.create')}}" class="float-right btn btn-outline-success btn-sm">Add New</a>
        </div>
        <div class="card-body">
            @if(session()->has('message'))
                <div class="text-success">
                    {{ session()->get('message') }}
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($customers as $key => $customer)
                                    <tr style="text-align: center;vertical-align: middle">
                                        <td>{{++$key}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->mobile}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td class="image-customer">
                                            <img
                                                src="{{asset('upload/imageCustomer/'.$customer->photo)}}"
                                                class="image-size" alt=""
                                                width="100">
                                        </td>
                                        <td>
                                            <a href="{{route('customer.show',$customer->id)}}"
                                               class="btn btn-info btn-sm"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{route('customer.edit',$customer->id)}}"
                                               class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{route('customer.destroy',$customer->id)}}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    {{ $customers->links() }}
@endsection




