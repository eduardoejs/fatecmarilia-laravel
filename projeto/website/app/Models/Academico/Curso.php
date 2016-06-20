<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nome', 'cargaHoraria', 'tempoDuracao', 'tipo_curso_id'];

    public function tipo_curso()
    {
    	return $this->belongsTo(\App\Models\Academico\TipoCurso::class);
    }
}
