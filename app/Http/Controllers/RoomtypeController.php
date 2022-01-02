<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RoomtypeController extends Controller
{

    public function index()
    {
        $rooms = RoomType::paginate(5);
        return view('admin.roomtype.index', compact('rooms'));
    }


    public function create()
    {
        return view('admin.roomtype.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'detail' => 'required',
        ]);

        $rooms = new RoomType();
        $rooms->title = $request->title;
        $rooms->price = $request->price;
        $rooms->detail = $request->detail;
        $rooms->save();

        if (is_array($request->file('images')) || is_object($request->file('images'))) {
            foreach ($request->file('images') as $image) {
                $imgPath = $image->store('images', 'public');
                $imageData = new Roomtypeimage();
                $imageData->room_type_id = $rooms->id;
                $imageData->image_src = $imgPath;
                $imageData->image_alt = $request->title;
                $imageData->save();
            }
        }
        return redirect(route('roomtype.index'))->with('message', 'Data has been added.');
    }


    public function show($id)
    {
        $rooms = RoomType::findOrFail($id);
        return view('admin.roomtype.show', compact('rooms'));
    }

    public function edit($id)
    {

        $rooms = RoomType::findOrFail($id);
        return view('admin.roomtype.edit', compact('rooms'));
    }


    public function update(Request $request, $id)
    {
        $rooms = RoomType::find($id);
        $rooms->title = $request->title;
        $rooms->price = $request->price;
        $rooms->detail = $request->detail;
        $rooms->save();

        if ($request->hasFile('images')) {
            if (is_array($request->file('images')) || is_object($request->file('images'))) {
                foreach ($request->file('images') as $image) {
                    $imgPath = $image->store('images', 'public');
                    $imageData = new Roomtypeimage();
                    $imageData->room_type_id = $rooms->id;
                    $imageData->image_src = $imgPath;
                    $imageData->image_alt = $request->title;
                    $imageData->save();
                }
            }


        }

        return redirect(route('roomtype.index'))->with('message', 'Data has been added.');
    }


    public function destroy($id)
    {
        $rooms = RoomType::findOrFail($id);
        $rooms->delete();
        return redirect()->route('roomtype.index')->with('message', 'Data has been delete');
    }

    public function destroyImage($img_id)
    {
        $rooms = Roomtypeimage::where('id', $img_id)->first();
        Storage::delete($rooms->image_src);
        Roomtypeimage::where('id', $img_id)->delete();
        return response()->json(['bool' => true]);
    }
}
