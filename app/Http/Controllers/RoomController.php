<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(5);
        return view('admin.room.index', compact('rooms'));
    }


    public function create()
    {
        $roomtypes = RoomType::all();
        return view('admin.room.create',compact('roomtypes'));
    }


    public function store(Request $request)
    {
        $rooms = new Room();
        $rooms->title = $request->title;
        $rooms->room_type_id = $request->room_type;
        $rooms->save();
        return redirect(route('room.index'))->with('message', 'Data has been added.');
    }


    public function show($id)
    {
        $rooms = Room::findOrFail($id);
        return view('admin.room.show', compact('rooms'));
    }

    public function edit($id)
    {

        $roomtypes = RoomType::all();
        $rooms = Room::find($id);
        return view('admin.room.edit', compact('rooms','roomtypes'));
    }


    public function update(Request $request, $id)
    {
        $rooms = Room::findOrFail($id);
        $rooms->title = $request->title;
        $rooms->room_type_id = $request->room_type;
        $rooms->save();
        return redirect(route('room.index'))->with('message', 'Data has been added.');
    }


    public function destroy($id)
    {
        $rooms = Room::findOrFail($id);
        $rooms->delete();
        return redirect()->route('room.index')->with('message','Data has been delete');
    }
}
