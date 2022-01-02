@extends('frontlayout.frontlayout')
@section('content')
    {{--Slider Section Start--}}
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($banners as $index => $banner)
                <div class="carousel-item @if($index==0) active @endif">
                    <img height="500" src="{{asset('upload/imageBanner/'.$banner->banner_src)}}" class="d-block w-100"
                         alt="{{$banner->alt_text}}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{--Slider Section End--}}

    {{--Service Section Start--}}
    <div class="container">
        <h1 class="text-center border-bottom">Service</h1>
        @foreach($services as $service)
            <div class="row mt-4">
                <div class="col-md-4">
                    <a href="{{route('service_detail',$service->id)}}"><img
                            src="{{asset('upload/imageService/'.$service->photo)}}" class="img-thumbnail" alt="..."></a>
                </div>
                <div class="col-md-8">
                    <h3>{{$service->title}}</h3>
                    <p>{{$service->small_desc}}</p>
                    <a href="{{route('service_detail',$service->id)}}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        @endforeach
    </div>
    {{--Service Section End--}}

    {{--Gallery Section Start--}}
    <div class="container my-4">
        <h1 class="text-center border-bottom" id="gallery">Gallery</h1>
        <div class="row my-4">
            @foreach($roomtypes as $roomtype)
                <div class="col-md-3">
                    <div class="card">
                        <h5 class="card-header">{{$roomtype->title}}</h5>
                        <div class="card-body">
                            @foreach($roomtype->roomtypeimages as $index => $image)
                                <a href="{{asset("/storage/".$image->image_src)}}" data-lightbox="
                            rgallery{{$roomtype->id}}">
                                    @if($index > 0)
                                        <img class="img-fluid hide" width="150"
                                             src="{{asset("/storage/".$image->image_src)}}">
                                    @else
                                        <img class="img-fluid" width="150"
                                             src="{{asset("/storage/".$image->image_src)}}">
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    {{--Gallery Section End--}}

    <h1 class="text-center mt-5" id="gallery">Testimonials</h1>
    <div id="testimonials" class="carousel slide p-5 bg-secondary text-white border mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($testimonials as $index => $testi)
                <div class="carousel-item @if($index==0) active @endif">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>{{$testi->test_cont}}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer text-white">
                            {{$testi->customer->name}}
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">
    <script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
    <style type="text/css">
        .hide {
            display: none;
        }
    </style>
    @endsection
    </body>
    </html>
