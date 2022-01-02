@extends('layout.admin.admin')
@section('page-heading','Add Room ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('customer.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tfoot>
                    <tr style="text-align: center;vertical-align: middle">
                        <th>STT</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <td style="text-align: center;vertical-align: middle">{{$customers->id}}</td>
                    <td style="text-align: center;vertical-align: middle" class="image-customer">
                        <img
                            src="{{asset('upload/imageCustomer/'.$customers->photo)}}" class="image-size" alt=""
                            width="100">
                    </td>
                    <td style="text-align: center;vertical-align: middle">{{$customers->name}}</td>
                    <td style="text-align: center;vertical-align: middle">{{$customers->email}}</td>
                    <td style="text-align: center;vertical-align: middle">{{$customers->mobile}}</td>
                    <td style="text-align: center;vertical-align: middle">{{$customers->address}}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




