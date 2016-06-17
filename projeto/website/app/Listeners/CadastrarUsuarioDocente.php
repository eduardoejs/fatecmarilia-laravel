<?php

namespace App\Listeners;

use App\Events\AddRoleDocenteToUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Academico\Docente;

class CadastrarUsuarioDocente
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
    public function handle(AddRoleDocenteToUser $event)
    {
        $user = $event->getUser();
        
        $docente = new Docente();
        $docente->nome = $user->name;
        $docente->email = $user->email;
        $docente->user_id = $user->id;
        $docente->save();        
    }
}
