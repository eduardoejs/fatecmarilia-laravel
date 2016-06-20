<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\Curso;

class CursosController extends Controller
{
    public function index()
    {
    	$this->authorize('list_curso');

    	$cursos = Curso::all();
		return view('admin.academico.cursos.index', compact('tipos'));
    }

    public function create()
    {
    	$this->authorize('add_curso');

    	$tipos = TipoCurso::all(); 
    	return view('admin.academico.cursos.create', compact('tipos'));
    }

    public function store(Request $request)
    {
    	$this->authorize('add_curso');
        TipoCurso::create($request->all());    	
		return redirect()->route('admin.cursos.index')->with('status', 'Cadastro realizado com sucesso!');    	
    }

    public function edit($id)
    {
        $this->authorize('edit_curso');
        $tipo = TipoCurso::find($id);
        return view('admin.academico.cursos.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_curso');
        TipoCurso::find($id)->update($request->all());
        return redirect()->route('admin.cursos.index');
    }

    public function destroy($id)
    {
        $this->authorize('destroy_curso');
        TipoCurso::find($id)->delete();        
        return redirect()->route('admin.cursos.index');
    }

    public function search(Request $request)
    {   
        $this->authorize('list_curso');
        
        $search = $request->input('search');
        if(!empty($request->input('search'))){
            $tipos = TipoCurso::orWhere('descricao','like', '%'.$request->input('search').'%')->get();
            return view('admin.academico.cursos.index', compact('tipos', 'search'));
        }
        
        return redirect()->route('admin.cursos.index');
    }
}
