<?php

namespace App\Models\Agenda;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
	protected $fillable = ['data', 'termo', 'turno', 'aula1', 'aula2', 'aula3', 'aula4', 'aula5', 'horarioInicial', 'horarioFinal', 'comentarios'];

    public function agenda()
    {
        return $this->belongsTo(\App\Models\Agenda\Agenda::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\ControleAcesso\User::class);
    }
}
