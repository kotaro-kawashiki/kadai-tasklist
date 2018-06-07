<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add

class UsersController extends Controller
{
    public function index()
    {
         if (\Auth::check()){
        
        $users = User::paginate(10);
        
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    else{
        return view('welcome');
    }
    }
    
     public function show($id)
    {
        $user = User::find($id);
        $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'tasklists' => $tasklists,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
}
