@extends('layouts.blog')
@section('title', $post->title)
@section('content')
        <h1 class="mt-5">{{$post->title}}</h1>
        <div class="card mt-3 mb-5 shadow">
            @if($post->cover_photo)
                <img class="card-img-top" src="{{$post->photo_url}}" alt="foto da capa" />
            @endif
            <div class="card-body bg-secondary text-white">
                <h5 class="card-title">
                <a href="{{route('post', $post->slug)}}" class="text-white">{{ $post->title }}</a>
                </h5>
                <p class="card-text">{{ $post->description }}</p>
            </div>
            <div class="p-4">
                {!! $post->content !!}
            </div>
            <div class="card-body py-0 text-primary">
                @foreach($post->categories as $category)
                    <a href="{{ route('category', $category->slug) }}" class="badge badge-light">{{$category->name}}</a>
                @endforeach
                <p class="float-right">{{ $post->created_at->format('d/m/Y - H:i:s') }}</p>
            </div>
        </div>

@endsection
