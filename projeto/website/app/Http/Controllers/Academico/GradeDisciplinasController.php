<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\GradeDisciplina;

class GradeDisciplinasController extends Controller
{
    public function index()
    {
    	$this->authorize('list_grade');

        $grades = GradeDisciplina::all();
        return view('admin.academico.grades.index', compact('grades'));
    }

    public function create()
    {
        $this->authorize('add_grade');

        return view('admin.academico.grades.create');
    }

    public function store(Request $request)
    {
    	$this->authorize('add_grade');

        try{
            GradeDisciplina::create($request->all());
            return redirect()->route('admin.grade.index')->with('status', 'Cadastro realizado com sucesso!');      
        }catch(\Exception $e){            
            return redirect()->route('admin.grade.index')->with('status-Erro', $e->getMessage());
        }        
    }

    public function edit($id)
    {
        $this->authorize('edit_grade');

        $grade = GradeDisciplina::find($id);
        return view('admin.academico.grades.edit', compact('grade'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_grade');

        GradeDisciplina::find($id)->update($request->all());
        return redirect()->route('admin.grade.index');
    }

    public function destroy($id)
    {
        $this->authorize('destroy_grade');

        GradeDisciplina::find($id)->delete();
        return redirect()->route('admin.grade.index');      
    }    
}
