<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class FooterController extends Controller
{
    public function index()
    {
        $infos = Info::all();
        return view(
            'footer.index',
            [
                'infos' => $infos,
            ]
        );
    }

    public function insert(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'copyright' => 'required',
        ]);

        Info::insert([
            'message' => $request->message,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'copyright' => $request->copyright,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'Info Added Successfully');
    }
    public function edit($id)
    {
        $info = Info::find($id);
        return view(
            'footer.edit',
            [
                'info' => $info,
            ]
        );
    }
    public function update(Request $request)
    {
        Info::find($request->id)->update([
            'message' => $request->message,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'copyright' => $request->copyright,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('status', 'updated successfully');
    }
}
