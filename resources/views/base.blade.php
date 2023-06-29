<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #f3a219;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img class="logo" src="{{ asset('/photo/FORMULA_LOGO.jpg') }}" height="90" alt="logo Piment">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a @class(['nav-link', 'fw-bold' => request()->route()->getName() === 'welcome']) href="{{ route('welcome') }}">Home</a>
                <a class="nav-link fw-medium @if(str_starts_with(request()->route()->getName(), 'blog'))" aria-current="page @endif " href="{{ route('blog.index') }}">Blog</a>
            </div>
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                        @method("delete")
                        @csrf
                        <button class="nav-link">Se déconnecter</button>
                    </form>
                @endauth
                @guest
                    <div class="nav-item">
                        <a href="{{ route('auth.login') }}">Se connecter</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>


    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @yield('content')
    </div>

</body>
</html>

<style>
    @layer demo {
        button {
            all: unset;
        }
    }
</style>
