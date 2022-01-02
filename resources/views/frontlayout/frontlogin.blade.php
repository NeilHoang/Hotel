@extends('frontlayout.frontlayout')
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Login</h3>
        @if(session()->has('message'))
            <div class="text-danger">
                {{ session()->get('message') }}
                @endif
                <form method="POST" action="{{route('customer.login')}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input name="email" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input name="password" type="password" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-outline-primary">Login</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

@endsection
