@extends('layout.admin.admin')
@section('page-heading','Add Booking ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('booking.history')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(session()->has('message'))
                <div class="text-success">
                    {{ session()->get('message') }}
                    @endif
                    <div class="table-responsive">
                        <form method="POST" action="{{route('booking.store')}}">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Select Customer <span class="text-danger">*</span></th>
                                    <td>
                                        <select class="form-control" name="customer_id">
                                            <option>--- Select Customer ---</option>
                                            @foreach($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>CheckIn Date <span class="text-danger">*</span></th>
                                    <td><input name="checkin_date" type="date" class="form-control checkin-date"/></td>
                                </tr>
                                <tr>
                                    <th>CheckOut Date <span class="text-danger">*</span></th>
                                    <td><input name="checkout_date" type="date" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <th>Avaiable Rooms <span class="text-danger">*</span></th>
                                    <td>
                                        <select class="form-control room-list" name="room_id">

                                        </select>
                                        <p>Price: <span class="show-room-price"></span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Adults <span class="text-danger">*</span></th>
                                    <td><input name="total_adults" type="text" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <th>Total Children</th>
                                    <td><input name="total_children" type="text" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="hidden" name="roomprice" class="room-price" value=""/>
                                        <input type="submit" class="btn btn-primary">
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
                    $(".checkin-date").on('blur', function () {
                        var _checkindate = $(this).val();
                        // Ajax
                        $.ajax({
                            url: "{{url('admin/booking')}}/available-rooms/" + _checkindate,
                            dataType: 'json',
                            beforeSend: function () {
                                $(".room-list").html('<option>--- Loading ---</option>');
                            },
                            success: function (res) {
                                var _html = '';
                                $.each(res.data, function (index, row) {
                                    _html += '<option data-price="' + row.roomtype.price + '" value="' + row.room.id + '">' + row.room.title + '--' + row.roomtype.title + '</option>';
                                });
                                $(".room-list").html(_html);
                                var _selectedPrice = $(".room-list").find('option:selected').attr('data-price');
                                $(".room-price").val(_selectedPrice);
                                $(".show-room-price").text(_selectedPrice);
                            }
                        })
                    })
                    $(document).on("change", ".room-list", function () {
                        var _selectedPrice = $(this).find('option:selected').attr('data-price');
                        $(".room-price").val(_selectedPrice);
                        $(".show-room-price").text(_selectedPrice);
                    })
                })
            </script>
@endsection
@endsection




