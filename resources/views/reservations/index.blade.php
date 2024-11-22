@extends('layouts.app')

@section('title', 'Lista de Reservas')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Lista de Reservas</h1>

        <!-- Mensajes de Éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón para Crear Nueva Reserva -->
        <div class="mb-4">
            <a href="{{ route('reservations.create') }}" class="btn btn-primary">
                Crear Nueva Reserva
            </a>
        </div>

        <!-- Tabla de Reservas -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Mesa</th>
                    <th>Fecha de Reserva</th>
                    <th>Número de Invitados</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->table }}</td>
                        <td>{{ $reservation->reservation_date->format('d/m/Y H:i') }}</td>
                        <td>{{ $reservation->guest_count }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <!-- Botón para Editar -->
                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                                <!-- Formulario para Eliminar -->
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta reserva?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay reservas registradas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
