<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\Disciplina;
use App\Models\Academico\GradeDisciplina;
use App\Models\Academico\Curso;

class DisciplinasController extends Controller
{
    private $limitPagination = 15;

    public function index()
    {
    	$this->authorize('list_disciplina');

        $disciplinas = Disciplina::paginate($this->limitPagination);
        return view('admin.academico.disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        $this->authorize('add_disciplina');

        $cursos = Curso::all();
        $grades = GradeDisciplina::all();
        return view('admin.academico.disciplinas.create', compact('cursos', 'grades'));
    }

    public function store(Request $request)
    {
    	$this->authorize('add_disciplina');

        try{
            Disciplina::create($request->all());
            return redirect()->route('admin.disciplinas.index')->with('status', 'Cadastro realizado com sucesso!');      
        }catch(\Exception $e){            
            return redirect()->route('admin.disciplinas.index')->with('status-Erro', $e->getMessage());
        }        
    }

    public function edit($id)
    {
        $this->authorize('edit_disciplina');

        $disciplina = Disciplina::find($id);
        $cursos = Curso::all();
        $grades = GradeDisciplina::all();
        return view('admin.academico.disciplinas.edit', compact('disciplina', 'cursos', 'grades'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_disciplina');

        Disciplina::find($id)->update($request->all());
        return redirect()->route('admin.disciplinas.index');
    }

    public function destroy($id)
    {
        $this->authorize('destroy_disciplina');

        Disciplina::find($id)->delete();
        return redirect()->route('admin.disciplinas.index');      
    }    

    public function search(Request $request)
    {
        $search = $request->input('search');  
        if(!empty($request->input('search'))){
            $disciplinas = Disciplina::where('nome', 'like', '%'.$request->input('search').'%')->paginate($this->limitPagination);
            return view('admin.academico.disciplinas.index', compact('disciplinas', 'search'));
        }        
        return redirect()->route('admin.disciplinas.index');
    }
}
