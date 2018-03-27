@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/task/store" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Название</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Текст</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" id="task-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">Добавить задачу</button>
                        </div>
                    </div>
                </form>

                @if (count($tasks) > 0)
                    <br>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Текущие задачи
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            @if($task->completed == 1)
                                                &#10003
                                            @endif
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->description }}</div>
                                        </td>
                                        <td>
                                            <a class="btn-sm btn-danger" href="/task/delete/{{ $task->id }}">
                                                <span class="oi oi-minus">Удалить</span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn-sm btn-primary" href="/show/{{ $task->id }}">
                                                <span class="oi oi-magnifying-glass">Редактировать</span>
                                            </a>
                                        </td>
                                        <td>
                                            @if($task->completed != 1)
                                                <a class="btn-sm btn-success" href="/task/check/{{ $task->id }}">
                                                    <span class="oi oi-task">Отметить</span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
