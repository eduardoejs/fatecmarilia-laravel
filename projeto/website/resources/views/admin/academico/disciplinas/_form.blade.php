<div class="form-group">
	{!! Form::label('curso', 'Disciplina do Curso de:') !!}
	<select name="curso_id" class="form-control" id="curso">
        @foreach($cursos as $curso)
            <option value="{{$curso->id}}" @if(isset($disciplina)) @if($curso->id == $disciplina->curso->id) selected="true" @endif @endif>{{$curso->nome}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
	{!! Form::label('grade', 'Grade da Disciplina:') !!}
	<select name="grade_disciplina_id" class="form-control" id="grade">
        @foreach($grades as $grade)
            <option value="{{$grade->id}}" @if(isset($disciplina)) @if($grade->id == $disciplina->grade_disciplina->id) selected="true" @endif @endif>{{$grade->codigoDoSiga}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('codigoDoSiga', 'Código no SIGA:') !!}
    {!! Form::text('codigoDoSiga', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nome', 'Nome da Disciplina:') !!}
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cargaHoraria', 'Carga Horária:') !!}
    {!! Form::number('cargaHoraria', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('semestre', 'Semestre da Disciplina:') !!}
    {!! Form::number('semestre', null, ['class'=>'form-control']) !!}
</div>

