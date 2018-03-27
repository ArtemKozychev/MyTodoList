<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Tasks $TaskModel)
    {

        $tasks = $TaskModel->getByUserId();
        return view('task', compact('tasks'));
    }

    public function show(Tasks $TaskModel, $id)
    {

        $task = $TaskModel->find($id);
        return view('update', compact('task'));
    }

    public function update(Tasks $TaskModel, Request $request)
    {

        $TaskModel->updateTask($request);
        return redirect('/task');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        Tasks::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'completed' => 0,
        ]);

        return redirect('/task');
    }

    public function delete($id)
    {

        Tasks::destroy($id);
        return redirect('/task');
    }

    public function checkTaskById(Tasks $TaskModel, $id)
    {

        $TaskModel->checkById($id);
        return redirect('/task');
    }
}
