<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <header class="text-center mb-5">
        <h1 class="display-4">¡Bienvenido al Sistema de Reservas!</h1>
        <p class="lead">Gestiona las reservas de tu restaurante de manera rápida y sencilla.</p>
    </header>

    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            @auth
                <!-- Mostrar si el usuario está autenticado -->
                <p class="mb-4">Hola, {{ Auth::user()->name }}. ¿Qué deseas hacer hoy?</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('reservations.index') }}" class="btn btn-primary btn-lg">Ir al Sistema de Reservas</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-lg">Cerrar Sesión</button>
                    </form>
                </div>
            @else
                <!-- Mostrar si el usuario NO está autenticado -->
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>

    <footer class="text-center mt-5">
        <p class="text-muted">© {{ date('Y') }} Sistema de Reservas. Todos los derechos reservados.</p>
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
