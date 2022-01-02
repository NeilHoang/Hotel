<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\File;

class StaffDepartment extends Controller
{
    public function index()
    {
        $departments = Department::paginate(5);
        return view('admin.department.index', compact('departments'));
    }


    public function create()
    {
        return view('admin.department.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);
        $departments = new Department();
        $departments->title = $request->title;
        $departments->detail = $request->detail;
        $departments->save();
        return redirect(route('department.index'))->with('message', 'Data has been added.');
    }


    public function show($id)
    {
        $departments = Department::find($id);
        return view('admin.department.show', compact('departments'));
    }

    public function edit($id)
    {

        $departments = Department::findOrFail($id);
        return view('admin.department.edit', compact('departments'));
    }


    public function update(Request $request, $id)
    {
        $departments = Department::findOrFail($id);
        $departments->title = $request->title;
        $departments->detail = $request->detail;
        $departments->save();
        return redirect(route('department.index'))->with('message', 'Data has been added.');
    }


    public function destroy($id)
    {
        $departments = Department::findOrFail($id);
        $departments->delete();
        return redirect()->route('department.index')->with('message', 'Data has been delete');
    }
}
