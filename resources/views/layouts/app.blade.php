<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TESTE SPASSU')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Meu CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('livros.index') }}">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('autores.index') }}">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('assuntos.index') }}">Assunto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4 fixed-bottom">
        <p>&copy; {{ date('Y') }} - Meu teste para a SPASSU</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    @yield('scripts')
</body>
</html>
