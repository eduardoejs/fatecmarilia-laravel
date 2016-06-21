<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{

	protected $fillable = ['descricao'];
    
    public function curso()
    {
    	return $this->hasMany(\App\Models\Academico\Curso::class);
    }    
}
