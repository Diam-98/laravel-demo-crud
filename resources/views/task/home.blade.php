@extends('task.layout')

@section('content')
    <a href="{{ route('create') }}" class="btn btn-primary mb-3">Ajouter une tâche</a>
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
            <tr>
                <td>Tache 1</td>
                <td>Lorem ipsum</td>
                <td>
{{--                    @if($task->completed)--}}
                        <span class="badge text-bg-success">Terminée</span>
{{--                    @else--}}
{{--                        <span class="badge badge-warning">En cours</span>--}}
{{--                    @endif--}}

                </td>
                <td>
                    <a href="" class="btn btn-sm btn-primary">Éditer</a>
                    <form action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
{{--        @endforeach--}}
        </tbody>
    </table>
@endsection
