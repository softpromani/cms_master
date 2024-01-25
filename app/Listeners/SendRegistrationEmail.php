<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\PasswordSetupEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class SendRegistrationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;
        // Assuming you have a WelcomeEmail Mailable class
        Mail::to($user->email)->send(new PasswordSetupEmail($user));
    }
}
