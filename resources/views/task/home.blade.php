@extends('task.layout')

@section('content')
    <div class="d-flex align-items-center">
        <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Ajouter une tâche</a>
        <a href="{{ route('logout') }}" class="btn btn-primary mb-3">Deconnection</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @if($task->isCompleted)
                        <span class="badge text-bg-success">Terminée</span>
                    @else
                        <span class="badge text-bg-warning">En cours</span>
                    @endif

                </td>
                <td class="d-flex align-items-center">
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
