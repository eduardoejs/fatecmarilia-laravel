<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\TipoCurso;

class TiposCursosController extends Controller
{
    public function index()
    {
    	$this->authorize('list_tipo_curso');

    	$tipos = TipoCurso::all();
		return view('admin.academico.cursos_tipos.index', compact('tipos'));
    }

    public function create()
    {
    	$this->authorize('add_tipo_curso');

    	$tipos = TipoCurso::all(); 
    	return view('admin.academico.cursos_tipos.create', compact('tipos'));
    }

    public function store(Request $request)
    {
    	$this->authorize('add_tipo_curso');
        TipoCurso::create($request->all());    	
		return redirect()->route('admin.tipos.cursos.index')->with('status', 'Cadastro realizado com sucesso!');    	
    }

    public function edit($id)
    {
        $this->authorize('edit_tipo_curso');
        $tipo = TipoCurso::find($id);
        return view('admin.academico.cursos_tipos.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_tipo_curso');
        TipoCurso::find($id)->update($request->all());
        return redirect()->route('admin.tipos.cursos.index');
    }

    public function destroy($id)
    {
        $this->authorize('destroy_tipo_curso');
        TipoCurso::find($id)->delete();        
        return redirect()->route('admin.tipos.cursos.index');
    }

    public function search(Request $request)
    {   
        $this->authorize('list_tipo_curso');
        
        $search = $request->input('search');
        if(!empty($request->input('search'))){
            $tipos = TipoCurso::orWhere('descricao','like', '%'.$request->input('search').'%')->get();
            return view('admin.academico.cursos_tipos.index', compact('tipos', 'search'));
        }
        
        return redirect()->route('admin.tipos.cursos.index');
    }
}
