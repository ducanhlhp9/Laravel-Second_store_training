<?php

namespace App\Http\Controllers;
use App\Models\article;
use App\Models\Comment;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function NewsDetail(Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url)){
            $articleHot = article::all()->sortByDesc('a_view');
            $articleNew = article::all()->sortByDesc('created_at');
            $NewsDetail = article::where([
                'id' => $id
            ])->first();
            $articlePrev = article::where([
                'id' => $id -1
            ])->get();

            $articleNext = article::where([
                'id' => $id +1
            ])->get();
            $comments=Comment::with('user:id,name')
                ->where('co_article_id',$id)
                ->orderBy('id','DESC')
                ->paginate(5);


            $viewData=[
                'NewsDetail'    =>  $NewsDetail,
                'articleNew'    =>  $articleNew,
                'articleHot'    =>  $articleHot,
                'articlePrev'   =>  $articlePrev,
                'articleNext'   =>  $articleNext,
                'comments'      =>  $comments
            ];
            return view('news.detail',$viewData);
        }
    }
}
