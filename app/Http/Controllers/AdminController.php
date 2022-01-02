<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function formLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where(['username' => $request->username, 'password' => $request->password])->count();
        if ($admin > 0) {
            $adminData = Admin::where(['username' => $request->username, 'password' => $request->password])->get();
            session(['adminData' => $adminData]);
            if ($request->has('rememberme')) {
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpassword', $request->password, 1440);
            }

            return redirect('admin');
        } else {
            return redirect(route('form.login'))->with('smg', 'Invalid Username/Password!!');
        }
    }

    public function logout()
    {
        session()->forget(['adminData']);
        return redirect(route('form.login'));
    }

    public function dashboard()
    {
        $bookings = Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        $labels = [];
        $data = [];
        foreach ($bookings as $booking) {
            $labels[] = $booking['checkin_date'];
            $data[] = $booking['total_bookings'];
        }
//        For Pie Chart
        $rtbookings = DB::table('room_types as rt')
            ->join('rooms as r', 'r.room_type_id', '=', 'rt.id')
            ->join('bookings as b', 'b.room_id', '=', 'r.id')
            ->select('rt.*', 'r.*', 'b.*', DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.room_type_id')
            ->get();
        $plabels = [];
        $pdata = [];
        foreach ($rtbookings as $rbooking) {
            $plabels[] = $rbooking->detail;
            $pdata[] = $rbooking->total_bookings;
        }
//        End
//        echo '<pre>';
//        print_r($rtbookings);

        return view('admin.dashboard', ['pdata' => $pdata, 'plabels' => $plabels, 'data' => $data, 'labels' => $labels]);
    }

    public function testimonials()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.testimonial', compact('testimonials'));
    }

    public function delete_testimonials($id)
    {
        $testimonials = Testimonial::find($id);
        $testimonials->delete();
        return redirect(route('testimonial.index'))->with('msg', 'Delete data has been success!');
    }
}
