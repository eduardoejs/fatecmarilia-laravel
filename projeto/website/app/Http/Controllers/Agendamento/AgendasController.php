<?php

namespace App\Http\Controllers\Agendamento;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Agenda\Agenda;
use App\Http\Controllers\Controller;

class AgendasController extends Controller
{
	public function __construct()
	{
		$this->authorize('role_admin');
	}

    public function index()
    {
    	$agendas = Agenda::all();
    	return view('admin.agendas.index', compact('agendas'));
    }

    public function create()
    {
    	return view('admin.agendas.create');
    }
    public function search(Request $request)
    {
    	$search = $request->input('search');
        if(!empty($request->input('search'))){
            $agendas = Agenda::orWhere('name','like', '%'.$request->input('search').'%')->get();
            return view('admin.agendas.index', compact('agendas', 'search'));
        }
        
        return redirect()->route('admin.roles.index');
    }

    public function store(Request $request)
    {	    	
	 	Agenda::create($request->all());
        return redirect()->route('admin.agendas.index');
    }

    public function edit($id)
    {
    	$agenda = Agenda::find($id);
    	return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
    	Agenda::find($id)->update($request->all());
        return redirect()->route('admin.agendas.index');
    }

    public function destroy($id)
    {
    	Agenda::find($id)->delete();
        return redirect()->route('admin.agendas.index');
    }
}
