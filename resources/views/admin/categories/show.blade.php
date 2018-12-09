@extends('layouts.admin')
@section('title', 'Visualizar')
@section('content')
    <div class="card">
        <div class="card-body bg-secondary text-white">
            <h5 class="card-title">{ $category->name }}</h5>
            <p class="card-text">{{ $category->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Status:</b> {{ $category->active ? 'Ativo' : 'Inativo' }}</li>
            <li class="list-group-item"><b>Slug:</b> {{ $category->slug }}</li>
            <li class="list-group-item"><b>Data de Criação:</b> {{ $category->created_at->format('d/m/Y - H:i:s') }}</li>
            <li class="list-group-item"><b>Data de Atualização:</b> {{ $category->updated_at->format('d/m/Y - H:i:s') }}</li>
        </ul>
        <div class="card-body">
            <a href="{{route('admin.categories.edit', $category->id)}}" class="card-link">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{route('admin.categories.destroy', $category->id)}}" class="card-link text-danger">
                <i class="fas fa-trash-alt"></i>
                Excluir</a>
            <a href="{{route('admin.categories.index')}}" class="card-link">Voltar</a>
        </div>
    </div>

@endsection