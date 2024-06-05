<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naslov_rada_hr' => 'required|string|max:255',
            'naslov_rada_en' => 'required|string|max:255',
            'zadatak_rada' => 'required|string',
            'tip_studija' => 'required|string',
        ]);
    
        $user = Auth::user();
    
        if ($user->role->name == 'student') {
            // Provjerite broj prijava studenta
            $numberOfApplications = $user->applications()->count();
    
            if ($numberOfApplications >= 5) {
                return back()->with('error', 'Dostigli ste maksimalni broj prijava.');
            }
        }
    
        $user->tasks()->create($request->all());
    
        return redirect()->route('tasks.index');
    }
    
    public function showStudents($id)
    {
        $task = Task::findOrFail($id);
        $students = $task->students;
        return view('tasks.students', compact('task', 'students'));
    }

    public function acceptStudent($taskId, $studentId)
    {
        $task = Task::findOrFail($taskId);
        $student = User::findOrFail($studentId);
        
        $task->accepted_student_id = $studentId;
        $task->save();
        
        return redirect()->route('tasks.showStudents', $task->id)->with('success', 'Student je uspješno prihvaćen.');
    }

}
