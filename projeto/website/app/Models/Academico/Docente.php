<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{    
    protected $fillable = ['nome', 'titulacao', 'sexo', 'urlLattes', 'email', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(\App\Models\ControleAcesso\User::class);
    }

    public function disciplinas()
    {
    	return $this->belongsToMany(\App\Models\Academico\Disciplina::class)->withTimestamps();
    }
}
