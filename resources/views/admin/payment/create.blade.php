@extends('layout.admin.admin')
@section('page-heading','Add Staff ')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('staff.index')}}" class="float-right btn btn-outline-success btn-sm">View All</a>

        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{route('staff.save_payment',$staff_id)}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Amount</th>
                            <td><input name="amount" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input name="amount_date" class="form-control" type="date" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

@endsection




