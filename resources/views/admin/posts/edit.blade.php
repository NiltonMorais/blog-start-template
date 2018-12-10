@extends('layouts.admin')
@section('title', 'Editar Publicação')
@section('content')
    @include('errors._check')

    {!! Form::model($post, ['route'=>['admin.posts.update', $post->id],'method'=>'PUT','files'=>true]) !!}
        @include('admin.posts._form')
        <div class="form-group">
            {!! Form::submit("Salvar publicação", ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.posts.index')}}" class="btn btn-link">Voltar</a>
        </div>
    {!! Form::close() !!}


@endsection