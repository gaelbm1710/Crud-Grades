@extends('layout')
@section('content')
<div class="container">
    <h1>Actividad de {{ $subject->nombre }}</h1>
    <a href="{{ route('subjects.gradable_activities.create', $subject->id) }}" class="btn btn-primary">Agregar Nueva Actividad Evaluativa</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Tipo de Actividad</th>
                <th>Calificación</th>
                <th>Fecha de Actividad</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $activity->tipo }}</td>
                <td>{{ $activity->grade }}</td>
                <td>{{ $activity->fecha_actividad }}</td>
                <td>{{ $activity->descripcion }}</td>
                <td>
                    <a href="{{ route('subjects.gradable_activities.edit', [$subject->id, $activity->id]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('subjects.gradable_activities.destroy', [$subject->id, $activity->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Regresar a Asignaturas</a>
</div>
@endsection
