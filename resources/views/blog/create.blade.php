@extends('base')

@section('title', 'Créer un article')

@section('content')
    <form action="" method="post">
        @csrf
        <div>
            Titre
            <input type="text" name="title" value="{{ old('title', 'Mon titre') }}">
            @error("title")
                {{$message}}
            @enderror
        </div>
        <div>
            Slug
            <input type="text" name="slug" value="{{ old('slug', 'Articlese') }}">
            @error("slug")
            {{$message}}
            @enderror
        </div>
        <div>
            Contenu
            <textarea name="content">{{ old('content', 'Contenu de démonstration') }}</textarea>
            @error("content")
            {{$message}}
            @enderror
        </div>
        <button>Enregister</button>
    </form>
@endsection

