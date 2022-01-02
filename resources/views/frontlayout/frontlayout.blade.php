<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="{{asset('bootstrap5/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">A Hotel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link btn btn-sm" href="{{route('page.about')}}">About Us</a>
                <a class="nav-link btn btn-sm" href="{{route('page.contact')}}">Contact Us</a>
                <a class="nav-link" aria-current="page" href="#">Service</a>
                <a class="nav-link" href="#">Gallery</a>
            @if(\Illuminate\Support\Facades\Session::has('customerLogin'))
                    <a class="nav-link btn btn-sm btn-outline-success" href="{{route('customer.add-testimonial')}}">Add Testimonial</a>
                    <a class="nav-link btn btn-sm btn-outline-danger" href="{{route('booking.front_booking')}}">Booking</a>
                    <a class="nav-link" href="{{route('customer.logout')}}">Logout</a>

                @else
                    <a class="nav-link" href="{{route('customer.formLogin')}}">Login</a>
                    <a class="nav-link" href="{{route('customer.register')}}">Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<main>
    @yield('content')
</main>
</body>
</html>
