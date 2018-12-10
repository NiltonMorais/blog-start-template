@extends('layouts.blog')
@section('title', 'Home')
@section('content')

    <div class="mt-3 w-100">
        <form class="my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar.." aria-label="Search" name="search">
        </form>
    </div>

    @foreach($posts as $post)
        <div class="card mt-3 mb-5 shadow">
            @if($post->cover_photo)
                <img class="card-img-top" src="{{$post->photo_url}}" alt="foto da capa" />
            @endif
            <div class="card-body bg-secondary text-white">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->description }}</p>
            </div>
            <div class="p-4">
                {!! $post->content !!}
            </div>
            <div class="card-body py-0 text-primary">
                <p class="float-left">{{ $post->categoriesList }}</p>
                <p class="float-right">{{ $post->created_at->format('d/m/Y - H:i:s') }}</p>
            </div>
        </div>
    @endforeach

    <div class="float-right mt-3">
        {!! $posts->links() !!}
    </div>

@endsection