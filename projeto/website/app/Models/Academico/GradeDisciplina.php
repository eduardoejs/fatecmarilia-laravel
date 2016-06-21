<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class GradeDisciplina extends Model
{
    protected $fillable = ['codigoDoSiga', 'descricao'];

    public function disciplinas()
    {
    	return $this->hasMany(\App\Models\Academico\Disciplina::class);
    }
}
