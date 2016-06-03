<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $value = old('name'), ['class'=>'form-control', 'required' => true]) !!}
    @if($errors->has('name')) <p class='help-block'>{{$errors->first('name')}}</p> @endif
</div>

<div class="form-group @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}    
    {!! Form::text('email', $value = old('email'), ['class'=>'form-control', 'required' => true]) !!}    
    @if($errors->has('email')) <p class='help-block'>{{$errors->first('email')}}</p> @endif
</div>

