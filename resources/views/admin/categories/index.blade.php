@extends('layouts.admin')
@section('title', 'Categorias')
@section('content')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success float-right mb-2">
        <i class="fas fa-plus"></i> Novo
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        {!!
                            $category->active ?
                                "<span class='badge badge-success'>Ativo</span>" :
                                "<span class='badge badge-warning'>Inativo</span>"
                        !!}
                    </td>
                    <td>
                        <a href="{{route('admin.categories.edit', $category->slug)}}" class="btn btn-sm btn-link" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('admin.categories.show', $category->slug)}}" class="btn btn-sm btn-link" title="Visualizar">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('admin.categories.destroy', $category->slug)}}" class="btn btn-sm btn-link text-danger" title="Remover">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {!! $categories->links() !!}
    </div>
@endsection