@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Popis radova</h1>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->title_hr }} / {{ $task->title_en }} - {{ $task->study_type }}</li>
        @endforeach
    </ul>
    <td>
        <a href="{{ route('tasks.showStudents', $task->id) }}" class="btn btn-primary">Prikaži studente</a>
    </td>
</div>
@endsection
