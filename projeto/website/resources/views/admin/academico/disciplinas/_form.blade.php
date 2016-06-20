<div class="form-group">
    {!! Form::label('name', 'Nome da Agenda:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('dias', 'Dias de Antecedência:') !!}
    {!! Form::number('diasAntecedencia', null, ['class'=>'form-control']) !!}
</div>