@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create new User</h2>

        {!! Form::open(['route'=>'restrict.users.store']) !!}

        @include('restrict.users._form')

        {!! Form::submit('Add user', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection