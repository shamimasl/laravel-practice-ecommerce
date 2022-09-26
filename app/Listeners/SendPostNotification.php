<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use App\Mail\Usermail;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendPostNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostProcessed  $event
     * @return void
     */
    public function handle(PostProcessed $event)
    {
        $users = Subscriber::all();
        foreach ($users as $user) {
            return $user->subscribed_email;

            Mail::to($user->subscribed_email)->send(new Usermail($event->addCat));
        }
    }
}
