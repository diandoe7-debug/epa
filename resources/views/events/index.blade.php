@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Mis Eventos</h2>
        <a href="{{ route('events.create') }}" class="btn btn-primary">+ Nuevo Evento</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Fechas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td><span class="badge bg-info text-dark">{{ $event->status }}</span></td>
                    <td>{{ $event->start_date }} - {{ $event->end_date }}</td>
                    <td>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-sm btn-secondary">Ver</a>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar evento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No hay eventos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
