<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function getTop5Users() {
        //get data from database
        $users = DB::table('users')
            ->select(array('users.name', 'users.email', DB::raw('COUNT(tasks.id) as tasksCount')))
            ->leftJoin('tasks', 'users.id', '=', 'tasks.user_id')
            ->groupBy('users.id')
            ->orderBy('tasksCount', 'desc')
            ->get();
        
        return $users;
    }
}
