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
                                            @if($task->flag == 1)
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
                                            <form action="/task/{{ $task->id }}" method="GET">
                                                <button>Удалить задачу</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="/show/{{ $task->id }}" method="GET">
                                                <button>Редактировать</button>
                                            </form>
                                        </td>
                                        <td>
                                            @if($task->flag != 1)
                                                <form action="/task/check/{{ $task->id }}" method="GET">
                                                    <button>Отметить задачу</button>
                                                </form>
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
