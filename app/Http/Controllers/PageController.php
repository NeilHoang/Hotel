<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mailjet\LaravelMailjet\Facades\Mailjet;

class PageController extends Controller
{
    function about_us()
    {
        return view('page-us.about_us');
    }

    function contact_us()
    {
        return view('page-us.contact_us');
    }

    function save_contactus(Request $request)
    {
//        $request->validate([
//            'full_name'=>'required',
//            'email'=>'required',
//            'subject'=>'required',
//            'msg'=>'required',
//        ]);
        $contacts = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg,
        );
        Mail::send('page-us.mail', $contacts, function ($message) {
            $message->to('hoangbuivan0962654936@gmail.com', 'Bui Hoang')->subject('Contact Us Query');
            $message->from('hoangbuivan0962654936@gmail.com', 'Bui Van Hoang');
        });
        return redirect(route('page.contact'))->with('msg', 'Data has been sent');
    }
}
