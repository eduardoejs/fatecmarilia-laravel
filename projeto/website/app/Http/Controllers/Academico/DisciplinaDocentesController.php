<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\Disciplina;
use App\Models\Academico\Curso;
use App\Models\Academico\GradeDisciplina;
use App\Models\Academico\Docente;
use App\Models\Academico\DocenteDisciplina;

class DisciplinaDocentesController extends Controller
{
    private $limitPagination = 15;

    public function index()
    {
    	$this->authorize('list_disciplina');
        //$disciplinas = Disciplina::paginate($this->limitPagination);

        $docentes = Docente::all();
        $cursos = Curso::all()->lists('nome', 'id');
        return view('admin.academico.disciplinasvinculadas.index', compact('docentes', 'cursos'));
    }

    public function getDisciplinas($idCurso, $idGrade)
    {
        /*$curso = Curso::find($idCurso);  
        $disciplinas = $curso->disciplinas()->getQuery()->get(['id', 'nome', 'codigoDoSiga', 'grade_disciplina_id']);
        return \Response::json($disciplinas);*/

        $disciplinas = \DB::table('disciplinas')                            
                            ->select('disciplinas.*')
                            ->where('curso_id', '=', $idCurso)
                            ->where('grade_disciplina_id', '=', $idGrade)
                            ->get();

        return \Response::json($disciplinas);
    }

    public function getGradesDisciplinas($idCurso)
    {
        $grades = \DB::table('disciplinas')
                        ->leftjoin('grade_disciplinas', 'disciplinas.grade_disciplina_id', '=', 'grade_disciplinas.id')
                        ->select('grade_disciplinas.id', 'grade_disciplinas.codigoDoSiga', 'grade_disciplinas.descricao', 'disciplinas.nome')
                        ->where('curso_id', '=', $idCurso)
                        ->groupby('grade_disciplina_id')
                        ->get();

        return \Response::json($grades);
    }

    public function getAtribuicoes($idDocente)
    {         
        $atribuicoes = \DB::table('docente_disciplinas')
                        ->join('docentes', 'docente_disciplinas.docente_id', '=', 'docentes.id')
                        ->join('disciplinas', 'docente_disciplinas.disciplina_id', '=', 'disciplinas.id')
                        ->join('grade_disciplinas', 'disciplinas.grade_disciplina_id', '=', 'grade_disciplinas.id')
                        ->join('cursos', 'disciplinas.curso_id', '=', 'cursos.id')
                        ->select('docente_disciplinas.id', 'disciplinas.nome as disciplina', 'disciplinas.codigoDoSiga as codSiga', 'grade_disciplinas.codigoDoSiga as grade', 'cursos.nome as curso')
                        ->where('docente_disciplinas.docente_id', '=', $idDocente)
                        ->get();
        return \Response::json($atribuicoes);
    }

    public function destroy($docenteId, $disciplinaId)
    {
        //$this->authorize('destroy_disciplina'); 
                
        $docente = Docente::find($docenteId);
        $disciplina = Disciplina::find($disciplinaId);
        $docente->disciplinas()->detach($disciplina);
        
        return redirect()->route('admin.disciplinas.vinculadas.index');
    } 

    public function store(Request $request)
    {
        //$this->authorize('add_disciplina');

        //EU ACHO QUE NAO SE USA O METODO CREATE E SIM O ATTACH, VER DEPOIS!!!

        try{
            $atribuido = DocenteDisciplina::where('docente_id', $request->input('docente'))->where('disciplina_id', $request->input('disciplina'))->first();
            if(!$atribuido){
                DocenteDisciplina::create(['docente_id' => $request->input('docente'), 'disciplina_id' => $request->input('disciplina')]);            
                return redirect()->route('admin.disciplinas.vinculadas.index')->with('status', 'Atribuição realizada com sucesso!');                    
            }            
            return redirect()->route('admin.disciplinas.vinculadas.index')->with('status-Erro', 'Disciplina já atribuída ao docente!');      
        }catch(\Exception $e){                    ;
            return redirect()->route('admin.disciplinas.vinculadas.index')->with('status-Erro', $e->getMessage());
        }        
    }

    /*public function atribuir()
    {
        //$this->authorize('add_disciplina');

        $docente = Docente::find($docenteId);
        return $docente->id;
        /*$disciplina = Disciplina::find($disciplinaId);
        $docente->disciplinas()->attach($disciplina);
        
        return redirect()->route('admin.disciplinas.vinculadas.index');*/
    /*}  */

    /*public function create()
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

     

    public function search(Request $request)
    {
        $search = $request->input('search');  
        if(!empty($request->input('search'))){
            $disciplinas = Disciplina::where('nome', 'like', '%'.$request->input('search').'%')->paginate($this->limitPagination);
            return view('admin.academico.disciplinas.index', compact('disciplinas', 'search'));
        }        
        return redirect()->route('admin.disciplinas.index');
    }*/
}
