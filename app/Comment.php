<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'user_id', 'comment_user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // コメントユーザidを取得
    public function comment_user_id()
    {
        return User::find($this->comment_user_id)->id;
    }
    
    // コメントユーザ名を取得
    public function comment_user_name()
    {
        return User::find($this->comment_user_id)->name;
    }
    
    // コメントユーザemailを取得
    public function comment_user_email()
    {
        return User::find($this->comment_user_id)->email;
    }
}
