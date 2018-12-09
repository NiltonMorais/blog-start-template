@extends('layouts.admin')
@section('title', 'Editar Categoria')
@section('content')
    @include('errors._check')

    {!! Form::model($category, ['route'=>['admin.categories.update', $category->id],'method'=>'PUT']) !!}
        @include('admin.categories._form')
        <div class="form-group">
            {!! Form::submit("Salvar categoria", ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.categories.index')}}" class="btn btn-link">Voltar</a>
        </div>
    {!! Form::close() !!}


@endsection