<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $value = old('name'), ['class'=>'form-control']) !!}
    {{ $errors->first('name') }}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', $value = old('email'), ['class'=>'form-control']) !!}
    {{ $errors->first('email') }}
</div>

<!--<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>-->