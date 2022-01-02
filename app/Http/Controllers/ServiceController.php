<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::paginate(5);
        return view('admin.service.index', compact('services'));
    }


    public function create()
    {
        return view('admin.service.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'small_desc' => 'required',
            'detail_desc' => 'required',
            'photo' => 'required',
        ]);
        $services = new Service();
        $services->title = $request->title;
        $services->small_desc = $request->small_desc;
        $services->detail_desc = $request->detail_desc;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageService', $fileName);
            $services->photo = $fileName;
        }
        $services->save();
        return redirect(route('service.index'))->with('message', 'Data has been added.');
    }


    public function show($id)
    {
        $services = Service::find($id);
        return view('admin.service.show', compact('services'));
    }


    public function edit($id)
    {
        $services = Service::find($id);
        return view('admin.service.edit', compact('services'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'small_desc' => 'required',
            'detail_desc' => 'required',
            'prev_photo' => 'required',
        ]);

        $services = Service::find($id);
        $services->title = $request->title;
        $services->small_desc = $request->small_desc;
        $services->detail_desc = $request->detail_desc;
        if ($request->hasFile('photo')) {
            $destination = 'upload/imageService/' . $services->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageService', $fileName);
            $services->photo = $fileName;
        }
        $services->save();
        return redirect(route('service.index'))->with('message', 'Data has been updated.');
    }


    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $destination = 'upload/imageService/' . $services->photo;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $services->delete();
        return redirect()->route('service.index')->with('message', 'Data has been delete');
    }
}
