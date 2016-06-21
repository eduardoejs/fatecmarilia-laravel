<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nome', 'cargaHoraria', 'tempoDuracao', 'tipo_curso_id', 'modalidade_id'];

    public function tipo_curso()
    {
    	return $this->belongsTo(\App\Models\Academico\TipoCurso::class);
    }

 	public function modalidade()
    {
    	return $this->belongsTo(\App\Models\Academico\Modalidade::class);
    }

    public function disciplinas()
    {
    	return $this->hasMany(\App\Models\Academico\Disciplina::class);
    }
       
}
