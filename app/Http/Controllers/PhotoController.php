<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function create()
    {
        $username = Auth::user()->name;
        $sum = Photo::where('user_create', '=', $username)->sum('size');
        $view = Photo::where('user_create', '=', $username)->orderBy('type')->get();
        return view('upload', compact('view', 'sum'));
    }
    public function store(Request $request)
    {
        $username = Auth::user()->name;
        $name = $request->file('photo')->getClientOriginalName();
        $mime = $request->file('photo')->getMimeType();
        $size = $request->file('photo')->getSize();

        $request->file('photo')->storeAs('public/images', $name);
        $photo = new Photo();
        $photo->name = $name;
        $photo->type = $mime;
        $photo->size = $size;
        $photo->user_create = $username;
        $photo->save();
        return redirect()->back()->with('sucess', 'อัพโหลดสำเร็จ');
    }
    public function edit($id)
    {
        $edit = Photo::find($id);
        return view('edit', compact('edit'));
    }
    public function update(Request $request, $id)
    {

        $name = $request->file('photo')->getClientOriginalName();
        $mime = $request->file('photo')->getMimeType();
        $size = $request->file('photo')->getSize();

        $request->file('photo')->storeAs('public/images', $name);
        $photo = Photo::find($id);
        $photo->name = $name;
        $photo->type = $mime;
        $photo->size = $size;
        $photo->save();
        return redirect()->back()->with('sucess', 'แก้ไขสำเร็จ');
    }
    public function delete($id)
    {
        $delete = Photo::find($id)->delete();
        return redirect()->back()->with('sucess', 'ลบสำเร็จ');
    }
}
