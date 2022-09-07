<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function namechange(Request $request)
    {
        $user_id = Auth::user()->id;
        User::find($user_id)->update([
            'name' => $request->name,
        ]);
        return back()->with('status', 'Name Changed Successfully');
    }
    public function passwordchange(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'password' => 'confirmed'
        ]);
        $uppercase = preg_match('@[A-Z]@', $request->password);
        $lowercase = preg_match('@[a-z]@', $request->password);
        $number    = preg_match('@[0-9]@', $request->password);
        if (!$uppercase || !$lowercase || !$number || strlen($request->password) < 6) {
            // tell the user something went wrong
            return back()->with('error', 'Your Password is Not Strong');
        } else {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                User::find(Auth::id())->update([
                    'password' => bcrypt($request->password),
                ]);
                return back()->with('success', 'Password Changed Successfully');
            } else {
                return back()->with('error', 'old password does not match');
            }
        }
    }
    public function photochange(Request $request)
    {
        $request->validate([
            'new_profile_photo' => 'required|image'
        ]);
        $photo = $request->file('new_profile_photo');
        $photo_name = Auth::id() . "." . $photo->getClientOriginalExtension();
        if (Auth::user()->profile_photo != 'default.jpg') {
            $path = public_path() . '/uploads/profile_photos/' . Auth::user()->profile_photo;
            unlink($path);
        }
        Image::make($photo)->save(base_path('public/uploads/profile_photos/' . $photo_name));
        User::find(Auth::id())->update([
            'profile_photo' => $photo_name,
        ]);


        return back();
    }
}
