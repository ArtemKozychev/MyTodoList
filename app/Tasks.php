<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tasks extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'completed'
    ];

    public function getByUserId(){
        return DB::table('tasks')
            ->where('user_id',Auth::id())
            ->orderBy('id', 'ASC')
            ->get();
    }

    public function checkById($id){
        return DB::table('tasks')
            ->where('id', $id)
            ->update(['completed' => 1]);
    }

    public function updateTask($data){
        return DB::table('tasks')
            ->where('id', $data->id)
            ->update(['name' => $data->name, 'description' => $data->description]);
    }
}
