<?php

namespace App\Http\Controllers\Agendamento;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Agenda\Agenda;
use App\Models\Agenda\Agendamento;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AgendamentosController extends Controller
{
    public function index()
    {
    	$this->authorize('list_agendamento');

    	$agendamentos = Agendamento::whereDate('data', '>=', Carbon::today()->toDateString())->orderBy('data', 'asc')->orderBy('agenda_id', 'desc')->paginate(15);
		return view('admin.agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
    	$this->authorize('add_agendamento');

    	$agendas = Agenda::all();
    	$disponibilidades = [];
    	return view('admin.agendamentos.create', compact('agendas', 'disponibilidades'));
    }

    /*public function getAgendamentos($data, $periodo, $agenda_id){
    	$data = Carbon::parse($data);//dia-mes-ano    	
    	$agendamentos = Agendamento::whereDate('data', '=', $data->format('Y-m-d'))->where('turno', '=', $periodo)->where('agenda_id', $agenda_id)->get(['aula1', 'aula2', 'aula3', 'aula4', 'aula5']);
    	
    	return \Response::json($agendamentos);
    }*/

	public function array_push_assoc($array, $key, $value){
		$array[$key] = $value;
		return $array;
	}

    public function getAgendamentos($data, $periodo, $agenda_id){
    	$data = Carbon::parse($data);//dia-mes-ano    	
    	$agendamentos = Agendamento::whereDate('data', '=', $data->format('Y-m-d'))->where('turno', '=', $periodo)->where('agenda_id', $agenda_id)->get(['aula1', 'aula2', 'aula3', 'aula4', 'aula5']);
    	
    	$array = ['aula1' => null,'aula2' => null,'aula3' => null,'aula4' => null,'aula5' => null];


    	for($i=0; $i<count($agendamentos); $i++){
    		
    		if(!is_null($agendamentos[$i]['aula1'])){
    			$array = $this->array_push_assoc($array, 'aula1', '1');
    		}
    		if(!is_null($agendamentos[$i]['aula2'])){
    			$array = $this->array_push_assoc($array, 'aula2', '1');
    		}
    		if(!is_null($agendamentos[$i]['aula3'])){
    			$array = $this->array_push_assoc($array, 'aula3', '1');
    		}
    		if(!is_null($agendamentos[$i]['aula4'])){
    			$array = $this->array_push_assoc($array, 'aula4', '1');
    		}
    		if(!is_null($agendamentos[$i]['aula5'])){
    			$array = $this->array_push_assoc($array, 'aula5', '1');
    		}
    	}

    	return \Response::json($array);
    }

    public function store(Request $request)
    {
    	$this->authorize('add_agendamento');

    	$var = $request->input('data-agendamento');
		$date = str_replace('/', '-', $var);
		$dateConvert = date('Y-m-d', strtotime($date));

    	$data = Carbon::parse($dateConvert);//ano-mes-dia
    	$agendamentos = Agendamento::whereDate('data', '=', $dateConvert)->where('turno', '=', $request->input('periodo'))->where('agenda_id', $request->input('agenda_id'))->get(['aula1', 'aula2', 'aula3', 'aula4', 'aula5']);

    	$agendamento = new Agendamento();
    	$agendamento->agenda_id = $request->input('agenda_id');
    	$agendamento->user_id = auth()->user()->id;
    	$agendamento->data = $dateConvert;
    	$agendamento->termo = $request->input('termo');
    	$agendamento->turno = $request->input('periodo');

    	if(count($agendamentos) > 0)
    	{
	    	foreach ($agendamentos as $disponivel) {
	    		
	    		if(is_null($disponivel->aula1)){
	    			$agendamento->aula1 = $request->input('aula1');
	    		}
	    		if(is_null($disponivel->aula2)){
	    			$agendamento->aula2 = $request->input('aula2');
	    		}
	    		if(is_null($disponivel->aula3)){
	    			$agendamento->aula3 = $request->input('aula3');
	    		}
	    		if(is_null($disponivel->aula4)){
	    			$agendamento->aula4 = $request->input('aula4');
	    		}
	    		if(is_null($disponivel->aula5)){
	    			$agendamento->aula5 = $request->input('aula5');
	    		}
	    	}
    	}else{
    		$agendamento->aula1 = $request->input('aula1');
    		$agendamento->aula2 = $request->input('aula2');
    		$agendamento->aula3 = $request->input('aula3');
    		$agendamento->aula4 = $request->input('aula4');
    		$agendamento->aula5 = $request->input('aula5');
    	}
    	
    	if(is_null($agendamento->aula1) && is_null($agendamento->aula2) && is_null($agendamento->aula3) && is_null($agendamento->aula4) && is_null($agendamento->aula5))
    		return redirect()->back()->withInput()->with('status', 'Para realizar o agendamento você deve selecionar ao menos uma aula que esteja disponível');
    	else{
    		$agendamento->save();    		
    		return redirect()->route('admin.agendamentos.index');
    	}
    }

    public function destroy($id)
    {
        $agendamento = new Agendamento();
        $agendamento = $agendamento->find($id);
        
        $this->authorize('manage', $agendamento);   
    	
        $agendamento->delete();        
        return redirect()->route('admin.agendamentos.index');
    }

    public function search(Request $request)
    {   
        
    }
}
