@extends('layout')
@section('content')
<div class="container">
    <h1>Agregar Nueva Actividad Evaluativa</h1>
    <form action="{{ route('subjects.gradable_activities.store', $subjectId) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo de Actividad</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required>
        </div>
        <div class="form-group">
            <label for="grade">Calificación</label>
            <input type="number" class="form-control" id="grade" name="grade" step="0.01" min="0">
        </div>
        <div class="form-group">
            <label for="fecha_actividad">Fecha de Actividad</label>
            <input type="date" class="form-control" id="fecha_actividad" name="fecha_actividad" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('subjects.gradable_activities.index', $subjectId) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
