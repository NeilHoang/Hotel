@extends('frontlayout.frontlayout')
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Add Testimonial</h3>
        @if(session()->has('msg'))
            <div class="text-success">
                {{ session()->get('msg') }}
                @endif
                <form method="POST" action="{{route('customer.save-testimonial')}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Testimonial<span class="text-danger">*</span></th>
                            <td><textarea name="testimonial_cont" class="form-control" rows="8"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary" /></td>
                        </tr>
                    </table>
                </form>
            </div>

@endsection
