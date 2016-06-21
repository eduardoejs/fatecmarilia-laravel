<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Academico\Modalidade;

class ModalidadesController extends Controller
{
    public function index()
    {
        $this->authorize('list_modalidade');
    	$modalidades = Modalidade::all();
        return view('admin.academico.modalidades.index', compact('modalidades'));
    }

    public function create()
    {
    	$this->authorize('add_modalidade');

        return view('admin.academico.modalidades.create');
    }

    public function store(Request $request)
    {
        $this->authorize('add_modalidade');

        Modalidade::create($request->all());     
        return redirect()->route('admin.modalidades.cursos.index')->with('status', 'Cadastro realizado com sucesso!');          	   	
    }

    public function edit($id)
    {
       $this->authorize('edit_modalidade');

       $modalidade = Modalidade::find($id);
       return view('admin.academico.modalidades.edit', compact('modalidade'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_modalidade');
        
        Modalidade::find($id)->update($request->all());
        return redirect()->route('admin.modalidades.cursos.index');
    }

    public function destroy($id)
    {
        $this->authorize('destroy_modalidade');
        
        Modalidade::find($id)->delete($id);
        return redirect()->route('admin.modalidades.cursos.index');   
    }    
}
