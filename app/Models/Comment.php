<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = ['*'];
    public function user(){
        return $this->belongsTo(user::class,'co_user_id');
    }
    public function article(){
        return $this->belongsTo(Article::class,'co_article_id');
    }
}
