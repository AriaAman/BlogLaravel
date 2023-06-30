@extends('base')

    @section('title', $post -> title)

    @section('content')
        <h1>Mon blog</h1>

            <article>
                <h2>{{ $post->title }}</h2>
                <p>
                    {{$post->content}}
                </p>
                @if($post->image)
                    <img src="{{ $post->imageUrl() }}">
                @endif
            </article>

    @endsection

