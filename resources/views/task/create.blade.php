@extends('task.layout')

@section('content')
    <h3>Modification d'une tache</h3>
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Titre de la tache">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="isCompleted" type="checkbox" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Termine ?
            </label>
        </div>
        <button type="submit" class="btn btn-info">Enregistrer</button>
    </form>
@endsection
