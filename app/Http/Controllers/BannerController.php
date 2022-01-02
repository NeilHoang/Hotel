<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }


    public function create()
    {
        return view('admin.banner.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'banner_src' => 'required|image',
            'alt_text' => 'required',
        ]);
        $banners = new Banner;
        $banners->alt_text = $request->alt_text;
        $banners->publish_status = $request->publish_status;
        if ($request->hasFile('banner_src')) {
            $file = $request->file('banner_src');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageBanner', $fileName);
            $banners->banner_src = $fileName;
        }

        $banners->save();
        return redirect(route('banner.index'))->with('msg', 'Data has been added.');
    }


    public function show($id)
    {
        $banners = Banner::find($id);
        return view('admin.banner.show', compact('banners'));
    }


    public function edit($id)
    {
        $banners = Banner::find($id);
        return view('admin.banner.edit', compact('banners'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'alt_text' => 'required',
        ]);
        $banners = Banner::find($id);
        $banners->alt_text = $request->alt_text;
        $banners->publish_status = $request->publish_status;
        if ($request->hasFile('banner_src')) {
            $destination = 'upload/imageBanner/' . $banners->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('banner_src');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/imageBanner', $fileName);
            $banners->banner_src = $fileName;
        }
        $banners->save();
        return redirect(route('banner.index'))->with('msg', 'Data has been updated !');
    }


    public function destroy($id)
    {
        $banners = Banner::findOrFail($id);
        $destination = 'upload/imageBanner/' . $banners->photo;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $banners->delete();
        return redirect()->route('banner.index')->with('msg', 'Data has been delete');
    }
}
