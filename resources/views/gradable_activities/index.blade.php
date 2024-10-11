@extends('layout')
@section('content')
    <h1>Actividades de Evaluación para {{ $subject->nombre }}</h1>
    <a href="{{ route('gradableActivities.create', $subject->id) }}" class="btn btn-primary">Agregar Actividad</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Calificación</th>
                <th>Fecha de Actividad</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gradableActivities as $activity)
                <tr>
                    <td>{{ $activity->id }}</td>
                    <td>{{ $activity->tipo }}</td>
                    <td>{{ $activity->grade }}</td>
                    <td>{{ $activity->fecha_actividad }}</td>
                    <td>{{ $activity->descripcion }}</td>
                    <td>
                        <a href="{{ route('gradableActivities.edit', [$subject->id, $activity->id]) }}">Editar</a>
                        <form action="{{ route('gradableActivities.destroy', [$subject->id, $activity->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
