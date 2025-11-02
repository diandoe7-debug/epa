@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Evento</h2>

    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nombre del Evento</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $event->name) }}">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label>Fecha de Inicio</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $event->start_date) }}">
            </div>
            <div class="col">
                <label>Fecha de Fin</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $event->end_date) }}">
            </div>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-select">
                <option value="borrador" @selected($event->status == 'borrador')>Borrador</option>
                <option value="activo" @selected($event->status == 'activo')>Activo</option>
                <option value="cerrado" @selected($event->status == 'cerrado')>Cerrado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
