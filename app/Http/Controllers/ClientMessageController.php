<?php

namespace App\Http\Controllers;

use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClientMessage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ClientMessageController extends Controller
{
    public function index()
    {
        $messages = ClientMessage::all();
        return view('client_message.index', [
            'messages' => $messages,
        ]);
    }
    public function insert(Request $request)
    {
        $photo = $request->file('image');
        $ran = Str::random(5);
        $photo_name = $ran . "." . $photo->getClientOriginalExtension();

        Image::make($photo)->save(base_path('public/uploads/client_photos/' . $photo_name));
        ClientMessage::insert([
            'message' => $request->message,
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $photo_name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'Message Added');
    }
}
