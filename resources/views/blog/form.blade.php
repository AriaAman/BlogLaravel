<form action="" method="post">
    @csrf
    @method($post->id ?"PATCH": "POST")
    <div class="form-group">
        Titre
        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
        @error("title")
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        Slug
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
        @error("slug")
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        Contenu
        <textarea class="form-control" name="content">{{ old('content', $post->content) }}</textarea>
        @error("content")
        {{$message}}
        @enderror
    </div>
    <button class="btn btn-primary">
        @if($post->id)
            Enregister
        @else
            Créer
        @endif
    </button>
</form>
