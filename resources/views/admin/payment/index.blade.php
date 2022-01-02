@extends('layout.admin.admin')
{{--@section('page-heading','Payment')--}}
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$staffs->name}}
                <a href="{{route('staff.add_payment',$staff_id)}}"
                   class="float-right btn btn-outline-success btn-sm">Add New Payment</a>
            </h6>

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
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($payments as $key => $payment)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->payment_date}}</td>
                                    <td>
                                        <a href="{{route('staff.delete_payment',['id'=>$payment->id,'staff_id'=>$staff_id])}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure to DELETE this data ?')"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Data Available in table</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
@endsection




