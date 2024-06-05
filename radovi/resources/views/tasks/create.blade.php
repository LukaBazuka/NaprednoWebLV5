@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodavanje rada</h1>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="title_hr">Naziv rada (HR)</label>
            <input type="text" name="title_hr" class="form-control" id="title_hr" required>
        </div>
        <div class="form-group">
            <label for="title_en">Naziv rada (EN)</label>
            <input type="text" name="title_en" class="form-control" id="title_en" required>
        </div>
        <div class="form-group">
            <label for="task_description">Zadatak rada</label>
            <textarea name="task_description" class="form-control" id="task_description" required></textarea>
        </div>
        <div class="form-group">
            <label for="study_type">Tip studija</label>
            <select name="study_type" class="form-control" id="study_type" required>
                <option value="stručni">Stručni</option>
                <option value="preddiplomski">Preddiplomski</option>
                <option value="diplomski">Diplomski</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj rad</button>
    </form>
</div>
@endsection
