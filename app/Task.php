<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'flag'
    ];

    public function getTaskByUserId(){
        return DB::table('tasks')
            ->where('user_id',Auth::id())
            ->orderBy('id', 'ASC')
            ->get();
    }

    public function getTaskById($id){
        return DB::table('tasks')
            ->select('id', 'name', 'description')
            ->where('id',$id)
            ->first();
    }


    public function checkTaskById($id){
        return DB::table('tasks')
            ->where('id', $id)
            ->update(['flag' => 1]);
    }

    public function updateTask($data){
        return DB::table('tasks')
            ->where('id', $data->id)
            ->update(['name' => $data->name, 'description' => $data->description]);
    }
}
