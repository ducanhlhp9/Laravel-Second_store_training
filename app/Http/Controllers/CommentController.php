<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function saveComment(Request $request,$id){
        if($request->ajax()){
            Comment::insert([
                'co_article_id' => $id,
                'co_content'=>$request->r_content,
                'co_user_id'=> get_data_user('web'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::Now()
            ]);
            return response()->json(['code'=>'1']);
        }
    }
}
