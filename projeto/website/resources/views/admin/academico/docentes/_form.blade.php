<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sexo', 'Sexo:') !!}
    <select name="sexo" class="form-control" id="sexo">        
        <option value="F" @if($docente->sexo == 'F') selected="true" @endif>Feminino</option>        
        <option value="M" @if($docente->sexo == 'M') selected="true" @endif>Masculino</option>                
    </select>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-Mail:') !!}
    {!! Form::text('email', null, ['class'=>'form-control', 'disabled'=>'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('urlLattes', 'Currículo Lattes:') !!}
    {!! Form::text('urlLattes', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('titulacao', 'Titulação Acadêmica:') !!}
    <select name="titulacao" class="form-control" id="titulacao">        
        <option value="Tecnologo" @if($docente->titulacao == 'Tecnologo') selected="true" @endif>Técnologo</option>        
        <option value="Bacharelado" @if($docente->titulacao == 'Bacharelado') selected="true" @endif >Bacharelado</option>        
        <option value="Licenciatura" @if($docente->titulacao == 'Licenciatura') selected="true" @endif>Licenciatura</option>        
        <option value="Especializacao" @if($docente->titulacao == 'Especializacao') selected="true" @endif>Especialização</option>        
        <option value="Mestrado" @if($docente->titulacao == 'Mestrado') selected="true" @endif>Mestrado</option>        
        <option value="Doutorado" @if($docente->titulacao == 'Doutorado') selected="true" @endif>Doutorado</option>        
        <option value="PosDoutorado" @if($docente->titulacao == 'PosDoutorado') selected="true" @endif>Pós-Doutorado</option> 
    </select>
</div>

<div class="form-group">    
    {{ Form::hidden('user_id', $docente->user_id) }}
</div>