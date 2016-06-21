<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\Docente;
use App\Models\ControleAcesso\User;

class DocentesController extends Controller
{
    private $limitPagination = 15;

    public function index()
    {
    	$this->authorize('list_docente');

        $docentes = Docente::paginate($this->limitPagination);
        return view('admin.academico.docentes.index', compact('docentes'));
    }

    public function edit($id)
    {
        $this->authorize('edit_docente');

        $docente = Docente::find($id);        
        return view('admin.academico.docentes.edit', compact('docente'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_docente');

        $docente = Docente::find($id);
        $docente->update($request->all());

        $docente->user->update(['name' => $docente->nome]);        

        return redirect()->route('admin.docentes.index');
    }

    public function destroy($id)
    {
        $this->authorize('destroy_docente');

        Docente::find($id)->delete();
        return redirect()->route('admin.docentes.index');      
    }    

    public function search(Request $request)
    {
        $search = $request->input('search');  
        if(!empty($request->input('search'))){
            $disciplinas = Disciplina::where('nome', 'like', '%'.$request->input('search').'%')->paginate($this->limitPagination);
            return view('admin.academico.docentes.index', compact('disciplinas', 'search'));
        }        
        return redirect()->route('admin.docentes.index');
    }
}
