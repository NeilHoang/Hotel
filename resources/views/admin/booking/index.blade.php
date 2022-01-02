@extends('layout.admin.admin')
@section('page-heading','Show Booking ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('booking.create')}}" class="float-right btn btn-outline-success btn-sm">Add new</a>
        </div>
        <div class="card-body">
            @if(session()->has('message'))
                <div class="text-success">
                    {{ session()->get('message') }}
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr style="text-align: center;vertical-align: middle">
                                <th>STT</th>
                                <th>Customer</th>
                                <th>Room No.</th>
                                <th>Room Type</th>
                                <th>CheckIn Date</th>
                                <th>CheckOut Date</th>
                                <th>Ref</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr style="text-align: center;vertical-align: middle">
                                <th>STT</th>
                                <th>Customer</th>
                                <th>Room No.</th>
                                <th>Room Type</th>
                                <th>CheckIn Date</th>
                                <th>CheckOut Date</th>
                                <th>Ref</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($bookings as $booking)
                                <tr style="text-align: center">
                                    <td>{{$booking->id}}</td>
                                    <td>{{$booking->customer->name}}</td>
                                    <td>{{$booking->room->title}}</td>
                                    <td>{{$booking->room->Roomtype->title}}</td>
                                    <td>{{$booking->checkin_date}}</td>
                                    <td>{{$booking->checkout_date}}</td>
                                    <td>{{$booking->ref}}</td>
                                    <td><a href="{{route('booking.destroy',$booking->id)}}" class="text-danger"
                                           onclick="return confirm('Are you sure you want to delete this data?')"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    {{ $bookings->links() }}
@endsection




