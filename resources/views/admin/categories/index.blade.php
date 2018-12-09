@extends('layouts.admin')
@section('title', 'Categorias')
@section('content')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success float-right mb-2">
        <i class="fas fa-plus"></i> Novo
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {!! $categories->links() !!}
    </div>
@endsection