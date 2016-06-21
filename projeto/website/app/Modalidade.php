<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    protected $fillable = ['descricao'];

    public function cursos()
    {
    	return $this->belongsTo(\App\Models\Academico\Curso::class);
    }
}
