@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/task/update" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$task->id}}">
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Название</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Текст</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" id="task-name" class="form-control" value="{{$task->description}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">Редактировать задачу</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
