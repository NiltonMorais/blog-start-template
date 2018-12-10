@extends('layouts.admin')
@section('title', 'Nova Publicação')
@section('content')
    @include('errors._check')

    {!! Form::open(['route'=>'admin.posts.store', 'files'=>true]) !!}
        @include('admin.posts._form')
        <div class="form-group">
            {!! Form::submit("Criar publicação", ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.posts.index')}}" class="btn btn-link">Voltar</a>
        </div>
    {!! Form::close() !!}

@endsection