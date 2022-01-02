<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('admin.customer.index', compact('customers'));
    }


    public function create()
    {
        return view('admin.customer.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
        ]);
        $customers = new Customer();
        $customers->name = $request->name;
        $customers->password = $request->password;
        $customers->email = $request->email;
        $customers->mobile = $request->mobile;
        $customers->address = $request->address;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageCustomer', $fileName);
            $customers->photo = $fileName;
        }
        $customers->save();

        $ref = $request->ref;
        if ($ref == 'front') {
            return redirect(route('customer.register'))->with('message', 'Data has been added.');

        }
        return redirect(route('customer.index'))->with('message', 'Data has been added.');
    }


    public function show($id)
    {
        $customers = Customer::findOrFail($id);
        return view('admin.customer.show', compact('customers'));
    }

    public function edit($id)
    {

        $customers = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customers'));
    }


    public function update(Request $request, $id)
    {
//        $request->validate([
//            'full_name' => 'required',
//            'email' => 'required|email',
//            'mobile' => 'required',
//        ]);
        $customers = Customer::find($id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->password = $request->password;
        $customers->address = $request->address;
        $customers->mobile = $request->mobile;
        if ($request->hasFile('photo')) {
            $destination = 'upload/imageCustomer/' . $customers->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageCustomer', $fileName);
            $customers->photo = $fileName;
        }
        $customers->save();
        return redirect(route('customer.index'))->with('message', 'Data has been updated.');
    }


    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        $destination = 'upload/imageCustomer/' . $customers->photo;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $customers->delete();
        return redirect()->route('customer.index')->with('message', 'Data has been delete');
    }

    function formLogin()
    {
        return view('frontlayout.frontlogin');
    }

    function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $detail = Customer::where(['email' => $email, 'password' => $password])->count();
        if ($detail > 0) {
            $detail = Customer::where(['email' => $email, 'password' => $password])->get();
            session(['customerLogin' => true, 'data' => $detail]);
            return redirect()->route('home');
        } else {
            return redirect()->route('customer.formLogin')->with('message', 'Invalid email/password');
        }
    }

    function logout()
    {
        session()->forget(['customerLogin','data']);
        return redirect(route('customer.formLogin'));
    }
}
