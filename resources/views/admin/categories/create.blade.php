@extends('layouts.admin')
@section('title', 'Nova Categoria')
@section('content')
    @include('errors._check')

    {!! Form::open(['route'=>'admin.categories.store']) !!}
        @include('admin.categories._form')
        <div class="form-group">
            {!! Form::submit("Criar categoria", ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.categories.index')}}" class="btn btn-link">Voltar</a>
        </div>
    {!! Form::close() !!}

@endsection