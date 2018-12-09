@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
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
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {!! $posts->links() !!}
    </div>
@endsection