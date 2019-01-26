<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index',[
           'users' => $users, 
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'user' => $user,
            'comments' => $comments,
        ];

        return view('users.show', $data);   
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('users.edit',[
           'user' => $user, 
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->profile = $request->profile;
        $user->save();
        
        return redirect('/');
    }
}
