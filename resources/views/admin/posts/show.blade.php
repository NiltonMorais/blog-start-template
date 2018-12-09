@extends('layouts.admin')
@section('title', 'Visualizar Publicação')
@section('content')
    <div class="card">
        <div class="card-body bg-secondary text-white">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
        </div>
        <div class="p-4">
            {!! $post->content !!}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Categoria:</b> {{ $post->categoriesList }}</li>
            <li class="list-group-item"><b>Status:</b>
                {!!
                    $post->active ?
                        "<span class='badge badge-success'>Ativo</span>" :
                        "<span class='badge badge-warning'>Inativo</span>"
                !!}
            </li>
            <li class="list-group-item"><b>Slug:</b> {{ $post->slug }}</li>
            <li class="list-group-item"><b>Data de Criação:</b> {{ $post->created_at->format('d/m/Y - H:i:s') }}</li>
            <li class="list-group-item"><b>Data de Atualização:</b> {{ $post->updated_at->format('d/m/Y - H:i:s') }}</li>
        </ul>
        <div class="card-body">
            <a href="{{route('admin.posts.edit', $post->id)}}" class="card-link">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{route('admin.posts.destroy', $post->slug)}}" class="card-link text-danger">
                <i class="fas fa-trash-alt"></i>
                Excluir</a>
            <a href="{{route('admin.posts.index')}}" class="card-link">Voltar</a>
        </div>
    </div>

@endsection