<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

use App\Comment;

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
        $comment_user = \Auth::user();
        
        $user->comments()->create(['comment' => $request->comment, 'comment_user_id' => $comment_user->id]);
        return back();
    }
    
    public function edit($id)
    {
        $comment = Comment::find($id);
        
        return view('comments.edit',[
           'comment' => $comment, 
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        if (\Auth::id() === $comment->comment_user_id()){
            $comment->delete();
        }
        
        return back();
    }
}
