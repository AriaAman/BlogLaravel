@extends('base')

    @section('title', $posts -> title)

    @section('content')
        <h1>Mon blog</h1>

            <article>
                <h2>{{ $posts->title }}</h2>
                <p>
                    {{$posts->content}}
                </p>
            </article>

    @endsection

