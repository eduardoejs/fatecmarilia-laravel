<div class="form-group">
    {!! Form::label('nome', 'Nome do curso:') !!}
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tipo_curso', 'Tipo do Curso:') !!}
	<select name="tipo_curso_id" class="form-control" id="tipo_curso">
        @foreach($tipos as $tipo)
            <option value="{{$tipo->id}}" @if(isset($curso)) @if($tipo->id == $curso->tipo_curso_id) selected="true" @endif @endif>{{$tipo->descricao}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('modalidade', 'Modalidade:') !!}    
    <select name="modalidade_id" class="form-control" id="modalidade">
        @foreach($modalidades as $modalidade)
            <option value="{{$modalidade->id}}"  @if(isset($curso)) @if($modalidade->id == $curso->modalidade_id) selected="true" @endif @endif>{{$modalidade->descricao}}</option>
        @endforeach
    </select>           
</div>

<div class="form-group">
    {!! Form::label('cargaHoraria', 'Carga Horária:') !!}
    {!! Form::number('cargaHoraria', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tempoDuracao', 'Tempo de Duração: (em anos)') !!}
    {!! Form::number('tempoDuracao', null, ['class'=>'form-control']) !!}
</div>