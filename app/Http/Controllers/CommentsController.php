<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class CommentsController extends Controller
{
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
              'user' => $user,
              'comments' => $comments, 
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $user->comments()->create(['user_id' => $request->user_id, 'comment' => $request->comment]);

        return back();
    }
    
    public function destroy($id)
    {
        $comment = \App\Comment::find($id);
        
        if (\Auth::id() === $comment->user_id){
            $comment->delete();
        }
        
        return back();
    }
}
