<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StaffCotroller extends Controller
{
    public function index()
    {
        $staffs = Staff::paginate(5);
        return view('admin.staff.index', compact('staffs'));
    }


    public function create()
    {
        $departs = Department::all();
        return view('admin.staff.create', compact('departs'));
    }


    public function store(Request $request)
    {

        $staffs = new Staff();
        $staffs->name = $request->name;
        $staffs->department_id = $request->department_id;
        $staffs->bio = $request->bio;
        $staffs->salary_type = $request->salary_type;
        $staffs->salary_amount = $request->salary_amount;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageStaff', $fileName);
            $staffs->photo = $fileName;
        }
        $staffs->save();
        return redirect(route('staff.index'))->with('message', 'Data has been added.');
    }

    public function show($id)
    {
        $staffs = Staff::find($id);
        return view('admin.staff.show', compact('staffs'));
    }

    public function edit($id)
    {

        $departs = Department::all();
        $staffs = Staff::find($id);
        return view('admin.staff.edit', compact('staffs', 'departs'));
    }


    public function update(Request $request, $id)
    {
        $staffs = Staff::find($id);
        if ($request->hasFile('photo')) {
            $destination = 'upload/imageStaff/' . $staffs->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageStaff', $fileName);
            $staffs->photo = $fileName;
        }
        $staffs->name = $request->name;
        $staffs->department_id = $request->department_id;
        $staffs->bio = $request->bio;
        $staffs->salary_type = $request->salary_type;
        $staffs->salary_amount = $request->salary_amount;
        $staffs->update();
        return redirect(route('staff.index'))->with('message', 'Data has been added.');
    }


    public function destroy($id)
    {
        $staffs = Staff::findOrFail($id);
        $destination = 'upload/imageStaff/' . $staffs->photo;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $staffs->delete();
        return redirect()->route('staff.index')->with('message', 'Data has been delete');
    }

    function all_payment(Request $request, $staff_id)
    {
        $payments = StaffPayment::where('staff_id', $staff_id)->get();
        $staffs = Staff::find($staff_id);
        return view('admin.payment.index', compact('payments', 'staffs', 'staff_id'));
    }

    public function add_payment($staff_id)
    {
        return view('admin.payment.create', compact('staff_id'));
    }

    function save_payment(Request $request, $staff_id)
    {

        $payments = new StaffPayment;
        $payments->staff_id = $staff_id;
        $payments->amount = $request->amount;
        $payments->payment_date = $request->amount_date;
        $payments->save();

        return redirect(route('staff.add_payment', $staff_id))->with('success', 'Data has been added.');
    }

    public function delete_payment($id,$staff_id)
    {
        StaffPayment::where('id',$id)->delete();
        return redirect(route('staff.all_payment',$staff_id))->with('success','Data has been deleted.');
    }
}
