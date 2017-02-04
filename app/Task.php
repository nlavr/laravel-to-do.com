<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    
    public static function insertOrUpdate($data, $user_id) {
        //prepare data for inserting and do it
        
        $task = empty($data->id) ? new self : Task::find($data->id);
        $task->title = $data->title;
        $task->content = $data->content;
        $task->user_id = $user_id;
        
        empty($data->id) ? $task->save() : $task->update();
        
        
    }
    public static function getTasks($user_id) {
        //get data from database depend on user id and deleted date
        $tasks = DB::table('tasks')
                ->where('user_id', $user_id)
                ->where('deleted_at', null)
                ->orderBy('done', 'asc')
                ->orderBy('updated_at', 'DESC')
                ->get();
        
        return $tasks;
    }



    
}
