<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['nome', 'cargaHoraria', 'semestre', 'codigoDoSiga'];
}
