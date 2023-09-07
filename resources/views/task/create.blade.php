@extends('task.layout')

@section('content')
    <h3>@if(isset($task)) Modification @else Ajout @endif d'une tache</h3>
    <form action="{{ isset($task) ? route('update', $task->id) : route('store') }}" method="post">
        @csrf
        @if(isset($task))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titre</label>
            <input type="text" name="title" @if(isset($task)) value="{{ old('title', $task->title) }}" @endif class="form-control" id="exampleFormControlInput1" placeholder="Titre de la tache">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
                {{ isset($task) ? old('description', $task->description) : '' }}
            </textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" {{ isset($task) && $task->isCompleted ? 'checked' : '' }} name="isCompleted" type="checkbox" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Termine ?
            </label>
        </div>
        <button type="submit" class="btn btn-info">@if(isset($task)) Modifier @else Ajouter @endif</button>
    </form>
@endsection
