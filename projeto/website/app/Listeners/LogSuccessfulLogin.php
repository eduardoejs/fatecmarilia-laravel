<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {        
        if($event->user->getPlainPassword() != null){            
            $user = $event->user;
            return response()->view('restrict.users.firstAccess',compact('user'))->header('Content-Type', 200);
        }else{
            
        }
    }
}
