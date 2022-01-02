<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(5);
        return view('admin.booking.index', compact('bookings'));
    }


    public function create()
    {
        $customers = Customer::all();
        return view('admin.booking.create', compact('customers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'room_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'total_adults' => 'required',
            'roomprice' => 'required',
        ]);
        if ($request->ref == 'front') {
            $sessionData = [
                'customer_id' => $request->customer_id,
                'room_id' => $request->room_id,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'total_adults' => $request->total_adults,
                'total_children' => $request->total_children,
                'roomprice' => $request->roomprice,
                'ref' => $request->ref
            ];
            session($sessionData);
            \Stripe\Stripe::setApiKey('sk_test_51K9UV5FJcj7l23rDfvZQAzzaYe3z9YDOGh3ZDiuzotgie4bUWfEGTCDSZ5fZSwafRViOpyk1Zc4USGEWnKxhf9AT00SAyRfOn7');
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'vnd',
                        'product_data' => [
                            'name' => 'Total Pay',
                        ],
                        'unit_amount' => $request->roomprice * 1,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/admin/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost:8000/admin/booking/fail',
            ]);
            return redirect($session->url);
        } else {
            $bookings = new Booking;
            $bookings->customer_id = $request->customer_id;
            $bookings->room_id = $request->room_id;
            $bookings->checkin_date = $request->checkin_date;
            $bookings->checkout_date = $request->checkout_date;
            $bookings->total_adults = $request->total_adults;
            $bookings->total_children = $request->total_children;
            if ($request->ref == 'front') {
                $bookings->ref = 'front';
            } else {
                $bookings->ref = 'admin';
            }
            $bookings->save();
            return redirect(route('booking.create'))->with('message', 'Data has been added.');
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Booking::where('id', $id)->delete();
        return redirect(route('booking.history'))->with('message', 'Data has been deleted.');
    }

    public function available_rooms(Request $request, $checkin_date)
    {
        $arooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
        $dataa = [];
        foreach ($arooms as $room) {
            $roomType = RoomType::find($room->room_type_id);
            $data[] = ['room' => $room, 'roomtype' => $roomType];
        }
        return response()->json(['data' => $data]);
    }

    public function front_booking()
    {
        return view('booking.front-booking');
    }

    function booking_payment_success(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51K9UV5FJcj7l23rDfvZQAzzaYe3z9YDOGh3ZDiuzotgie4bUWfEGTCDSZ5fZSwafRViOpyk1Zc4USGEWnKxhf9AT00SAyRfOn7');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        $customer = \Stripe\Customer::retrieve($session->customer);
        if ($session->payment_status == 'paid') {
            $bookings = new Booking;
            $bookings->customer_id = session('customer_id');
            $bookings->room_id = session('room_id');
            $bookings->checkin_date = session('checkin_date');
            $bookings->checkout_date = session('checkout_date');
            $bookings->total_adults = session('total_adults');
            $bookings->total_children = session('total_children');
            if (session('ref') == 'front') {
                $bookings->ref = 'front';
            } else {
                $bookings->ref = 'admin';
            }
            $bookings->save();
            return view('admin.booking.success');
        }
    }

    function booking_payment_fail(Request $request)
    {
        return view('admin.booking.failure');
    }
}
