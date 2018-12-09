@extends('layouts.admin')
@section('title', 'Nova Publicação')
@section('content')
    @include('errors._check')

    {!! Form::open(['route'=>'admin.posts.store']) !!}
        @include('admin.posts._form')
        <div class="form-group">
            {!! Form::submit("Criar publicação", ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection