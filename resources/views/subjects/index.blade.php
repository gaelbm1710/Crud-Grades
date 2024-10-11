@extends('layout')
@section('content')
<div class="container">
    <h1>Signatures</h1>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary">Agregar Nueva Asignatura</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->nombre }}</td>
                <td>{{ $subject->descripcion }}</td>
                <td>
                    <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-info">Ver Actividades</a>
                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
