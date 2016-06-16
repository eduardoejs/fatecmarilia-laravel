<div class="form-group">
    {!! Form::label('agendas', 'Agendamento para :') !!}
    <select name="agenda_id" class="form-control" id="agenda">
        @foreach($agendas as $agenda)
            <option value="{{$agenda->id}}" data-antecedencia="{{$agenda->diasAntecedencia}}" @if($agenda->id == old('agenda_id')) selected="true" @endif >{{$agenda->name}}</option>                
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('termo', 'Termo:') !!}
    <select name="termo" class="form-control" id="termo">
        @for($i = 1; $i <=6; $i++)
            <option value="{{$i}}" @if($i == old('termo')) selected="true" @endif >{{$i}}º Termo</option>
        @endfor
    </select>    
</div>
<div class="form-group">
    {!! Form::label('periodo', 'Período:') !!}
    <select name="periodo" class="form-control" id="periodo">
        <option value="M" @if('M' == old('periodo')) selected="true" @endif>Manhã</option>        
        <option value="N" @if('N' == old('periodo')) selected="true" @endif>Noite</option>
    </select>    
</div>

<div class="form-group">
    {!! Form::label('data', 'Data:') !!}
    <input id="datepicker" name="data-agendamento" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ old('data-agendamento') }}">
</div>

<div class="form-group">
    {!! Form::label('aulas', 'Aulas disponíveis:') !!}
    <div id="chkList"></div>        
    <input type="checkbox" name="aula1" value="1" id="aula1"> Aula 1
    <input type="checkbox" name="aula2" value="1" id="aula2"> Aula 2
    <input type="checkbox" name="aula3" value="1" id="aula3"> Aula 3
    <input type="checkbox" name="aula4" value="1" id="aula4"> Aula 4
    <input type="checkbox" name="aula5" value="1" id="aula5"> Aula 5
    </div>
</div>

