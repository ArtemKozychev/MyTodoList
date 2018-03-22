<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description',
    ];

    public function getTaskByUserId(){
        return DB::table('tasks')
            ->where('user_id',Auth::id())
            ->orderBy('id', 'ASC')
            ->get();
    }
}
