<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class TipoCurso extends Model
{
    protected $fillable = ['descricao'];

    public function cursos()
    {
    	return $this->hasMany(\App\Models\Academico\Curso::class);
    }
}
