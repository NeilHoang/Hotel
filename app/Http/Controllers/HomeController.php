<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Roomtypeimage;
use App\Models\RoomType;
use App\Models\Testimonial;

class HomeController extends Controller
{
    function home()
    {
        $banners = Banner::where('publish_status', 'on')->get();
        $roomtypes = RoomType::all();
        $services = Service::all();
        $testimonials = Testimonial::all();
        return view('home', compact('roomtypes', 'services', 'testimonials','banners'));
    }

    // Service Detail Page
    function service_detail(Request $request, $id)
    {
        $services = Service::find($id);
        return View('service.detail', compact('services'));
    }

    // Add Testimonial
    function add_testimonial()
    {
        return view('testimonial.add-testimonial');
    }

    function save_testimonial(Request $request)
    {
        $customerId = session('data')[0]->id;
        $data = new Testimonial;
        $data->customer_id = $customerId;
        $data->test_cont = $request->testimonial_cont;
        $data->save();

        return redirect(route('customer.add-testimonial'))->with('msg', 'Data has been added.');
    }
}
