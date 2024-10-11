@extends('layout')
@section('content')
<div class="container">
    <h1>Editar Actividad Evaluativa</h1>
    <form action="{{ route('subjects.gradable_activities.update', [$subjectId, $activity->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipo">Tipo de Actividad</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $activity->tipo }}" required>
        </div>
        <div class="form-group">
            <label for="grade">Calificación</label>
            <input type="number" class="form-control" id="grade" name="grade" value="{{ $activity->grade }}" step="0.01" min="0">
        </div>
        <div class="form-group">
            <label for="fecha_actividad">Fecha de Actividad</label>
            <input type="date" class="form-control" id="fecha_actividad" name="fecha_actividad" value="{{ $activity->fecha_actividad }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $activity->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('subjects.gradable_activities.index', $subjectId) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
