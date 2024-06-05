@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prijavljeni studenti na rad "{{ $task->title_hr }}"</h1>
    <ul>
        @foreach($students as $student)
            <li>
                {{ $student->name }} ({{ $student->email }})
                <form action="{{ route('tasks.acceptStudent', ['taskId' => $task->id, 'studentId' => $student->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Prihvati</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
