<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Agenda\Agendamento;
use App\Models\ControleAcesso\User;

class AgendamentoPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Agendamento $agendamento){
        return $user->id == $agendamento->user_id || $user->isAdmin();
    }
}
