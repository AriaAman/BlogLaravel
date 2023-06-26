@extends('base')

@section('title', 'Blog')

@section('content')
    <div class="title">
        <h1>Nos articles :</h1>
        <div class="btn">
            <a class="btn btn-success" href="{{ route('blog.create') }}">New</a>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-between">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('/photo/FORMULA_LOGO.jpg') }}" class="card-img-top" alt="Image de l'article" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    {{--<p class="card-text">{{ $post->content }}</p>--}}
                    <div class="mt-auto">
                        <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-primary">Lire l'article</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{$posts}}
@endsection

<style>
.title {
    display: flex;
    justify-content: space-between;
}
.btn{

}
</style>
