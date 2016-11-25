<?php

namespace App\Listeners;

use App\Events\UsuarioCriado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarSenhaParaUsuario
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
     * @param  UsuarioCriado  $event
     * @return void
     */
    public function handle(UsuarioCriado $event)
    {
        $user = $event->getUser();
        
        \Mail::send('auth.emails.sendPasswordCreateUser', array('user' => $user), function($message) use ($user){
           //$message->from('');
           $message->to($user->email, $user->name)->subject('Dados para acesso ao site');
        });
        
        $user->plainPassword = null;
        $user->save();
    }
}
