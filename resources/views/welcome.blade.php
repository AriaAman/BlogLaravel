@extends('base')

@section('title', 'Accueil')

@section('content')
    <div class="hero">
                <video class="video" src="../video/F1Video.mp4" muted loop autoplay></video>
        <div class="hero-content">
            <h1 class="hero-title">Bienvenue sur OneFormula !</h1>
            <p class="hero-subtitle">Découvrez les dernières actualités, les analyses approfondies, les résumés de courses et bien plus encore.</p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary">Explorer les articles</a>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .video {
            position: absolute;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: 0;
        }
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
        }

        .hero-content {
            max-width: 600px;
            text-align: center;
            color: #fff;
        }

        .hero-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .hero-subtitle {
            font-size: 18px;
            margin-bottom: 24px;
        }

        .btn {
            display: inline-block;
            background-color: #3490dc;
            color: #fff;
            padding: 12px 24px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2779bd;
        }
    </style>
@endpush
