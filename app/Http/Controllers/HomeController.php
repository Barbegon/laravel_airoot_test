<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $username = Auth::user()->name;
        $view = Photo::where('user_create', '=', $username)->orderBy('type')->get();
        $photo = Catalog::where('user_create', '=', $username)->get();
        return view('home', compact('view', 'photo'));
    }
    public function catalog(Request $request)
    {
        $username = Auth::user()->name;
        $title = $request->title;
        $img = $request->images;

        $photo = '';
        foreach ($img as $value) {
            $photo .=  $value;
        }

        $catalog = new Catalog();
        $catalog->title = $title;
        $catalog->images = $photo;
        $catalog->user_create = $username;
        $catalog->save();
        return redirect()->back()->with('sucess', 'สร้างสำเร็จ');
    }

    public function editcat($id)
    {
        $editcat = Catalog::find($id);
        return view('editcat', compact('editcat'));
    }
    public function updatecat(Request $request, $id)
    {
        $title = $request->title;
        $updatecat = Catalog::find($id);
        $updatecat->title = $title;
        $updatecat->save();
        return redirect()->back()->with('sucess', 'แก้ไขสำเร็จ');
    }
    public function deletecat($id)
    {
        $deletecat = Catalog::find($id)->delete();
        return redirect()->back()->with('sucess', 'ลบสำเร็จ');
    }
}
