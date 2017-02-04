<?php

namespace App\Http\Controllers;

//insert all what we needs
use App\Http\Controllers\Controller;
use \App\User;


class WelcomeController extends Controller
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        //get top5users from database
        $users = User::getTop5Users();
        
        //send data to view
        return view('welcome', compact('users'));
    }
}
