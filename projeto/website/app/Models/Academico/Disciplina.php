<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['nome', 'cargaHoraria', 'semestre', 'codigoDoSiga', 'curso_id', 'grade_disciplina_id'];

    public function curso()
    {
    	return $this->belongsTo(\App\Models\Academico\Curso::class);
    }

    public function grade_disciplina()
    {
    	return $this->belongsTo(\App\Models\Academico\GradeDisciplina::class);
    }

    public function docentes()
    {
    	return $this->belongsToMany(\App\Models\Academico\Docente::class)->withTimestamps();
    }
}
