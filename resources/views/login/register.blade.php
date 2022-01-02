@extends('frontlayout.frontlayout')
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Register</h3>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif
        @if(session()->has('message'))
            <div class="text-success">
                {{ session()->get('message') }}
                @endif
                <form method="POST" action="{{route('customer.login')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Name <span class="text-danger">*</span></th>
                            <td><input name="name" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input name="email" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <td><input name="mobile" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input name="password" type="password" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Address <span class="text-danger">*</span></th>
                            <td><textarea name="address" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input name="photo" type="file"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="ref" value="front">
                            <td colspan="2"><input type="submit" class="btn btn-outline-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>

@endsection
