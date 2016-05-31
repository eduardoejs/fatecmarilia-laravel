@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Editing user: {{$user->name}}</h2>

        {!! Form::model($user, ['route'=>['restrict.users.update', $user->id], 'method'=>'put']) !!}

        @include('restrict.users._form')

        {!! Form::submit('Save user', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection