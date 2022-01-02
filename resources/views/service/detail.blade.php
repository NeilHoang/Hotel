@extends('frontlayout.frontlayout')
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">{{$services->title}}</h3>
        <p>{{$services->detail_desc}}</p>
    </div>
@endsection
