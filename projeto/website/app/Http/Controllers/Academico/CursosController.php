<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\Curso;
use App\Models\Academico\TipoCurso;
use App\Models\Academico\Modalidade;

class CursosController extends Controller
{
    public function index()
    {
    	$this->authorize('list_curso');

    	$cursos = Curso::all();        
		return view('admin.academico.cursos.index', compact('cursos'));
    }

    public function create()
    {
    	$this->authorize('add_curso');

    	$cursos = Curso::all(); 
        $tipos = TipoCurso::all();
        $modalidades = Modalidade::all();
    	return view('admin.academico.cursos.create', compact('cursos', 'tipos', 'modalidades'));
    }

    public function store(Request $request)
    {
    	$this->authorize('add_curso');
        Curso::create($request->all());    	
		return redirect()->route('admin.cursos.index')->with('status', 'Cadastro realizado com sucesso!');    	
    }

    public function edit($id)
    {
        $this->authorize('edit_curso');
        $curso = Curso::find($id);
        $tipos = TipoCurso::all();
        $modalidades = Modalidade::all();
        return view('admin.academico.cursos.edit', compact('curso', 'tipos', 'modalidades'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_curso');
        
        Curso::find($id)->update($request->all());
        return redirect()->route('admin.cursos.index');
    }

    public function destroy($id)
    {
        $this->authorize('destroy_curso');
        Curso::find($id)->delete();        
        return redirect()->route('admin.cursos.index');
    }

    public function search(Request $request)
    {   
        $this->authorize('list_curso');
        
        $search = $request->input('search');
        if(!empty($request->input('search'))){
            $tipos = Curso::orWhere('descricao','like', '%'.$request->input('search').'%')->get();
            return view('admin.academico.cursos.index', compact('tipos', 'search'));
        }
        
        return redirect()->route('admin.cursos.index');
    }
}
