<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Task $TaskModel)
    {
        $tasks = $TaskModel->getTaskByUserId();
        return view('task', compact('tasks'));
    }

    public function show(Task $TaskModel, $id){
        $task = $TaskModel->getTaskById($id);
        return view('update', compact('task'));
    }

    public function update(Task $TaskModel, Request $request){
        $TaskModel->updateTask($request);
        return redirect('/task');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'flag' => 0,
        ]);

        return redirect('/task');
    }

    public function destroy($id)
    {
       Task::destroy($id);
        return redirect('/task');
    }
    public function checkTaskById(Task $TaskModel, $id)
    {
        $TaskModel->checkTaskById($id);
        return redirect('/task');
    }
}
