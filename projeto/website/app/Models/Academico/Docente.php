<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    protected $fillable = ['nome', 'titulacao', 'sexo', 'urlLattes', 'email', 'user_id'];
}
