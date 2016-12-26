<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class DocenteDisciplina extends Model
{
    protected $fillable = ['docente_id', 'disciplina_id'];

    public function disciplina()
    {
    	return $this->belongsTo(\App\Models\Academico\Disciplina::class);
    }

    public function docente()
    {
    	return $this->belongsTo(\App\Models\Academico\Docente::class);
    }
}
