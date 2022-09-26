<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Events\PostProcessed;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('newsletter.index', [
            'subscribers' => $subscribers,
        ]);
    }
    public function insert(Request $request)
    {
        Subscriber::insert([
            'subscribed_email' => $request->subscribed_email,
            'created_at' => Carbon::now()
        ]);

        return back()->with('subscribe', 'You subscribed successfully');
    }
    public function send(Request $request)
    {
        $edata = $request->des;
        event(new PostProcessed($edata));
        return back()->with('status', 'Email Sent Successfully');
    }
}
