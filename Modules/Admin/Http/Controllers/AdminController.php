<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Transaction;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $user = user::select()->count();
        $product = Product::select()->count();
        $article = Article::select()->count();
        $rating = Rating::select()->count();
        $viewData=[
            'user'=>$user,
            'product'=>$product,
            'article'=>$article,
            'rating'=>$rating
        ];
        //doanh thu theo ngày
        $moneyDay = Transaction::whereday('updated_at',date('d'))
            ->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');
        //Doanh thu theo tháng
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
            ->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');
        //1 sao
        $rating1= Rating::where('ra_number','1')->count();
        $rating2= Rating::where('ra_number','2')->count();
        $rating3= Rating::where('ra_number','3')->count();
        $rating4= Rating::where('ra_number','4')->count();
        $rating5= Rating::where('ra_number','5')->count();
        $dataRating =[
            [
                "name"=>"1 sao",
                'y'=>(int)$rating1
            ],
            [
                "name"=>"2 sao",
                'y'=>(int)$rating2
            ],
            [
                "name"=>"3 sao",
                'y'=>(int)$rating3
            ],
            [
                "name"=>"4 sao",
                'y'=>(int)$rating4
            ],
            [
                "name"=>"5 sao",
                'y'=>(int)$rating5
            ],
        ];
        $users = user::paginate(4);
        $products = Product::paginate(10);
        $articles = Article::paginate(10);
        $ratings = Rating::paginate(4);
        $dataMoney =[
            [
                "name" => "doanh thu ngày",
                'y' => (int)$moneyDay
            ],
            [
                "name" => "doanh thu tháng",
                'y' => (int)$moneyMonth
            ]
        ];
        $viewData1=[
            'users'=>$users,
            'products'=>$products,
            'articles'=>$articles,
            'ratings'=>$ratings,
            'moneyDay'=>$moneyDay,
            'moneyMonth'=>$moneyMonth,
            "dataMoney"=>json_encode($dataMoney),
            'dataRating'=>json_encode($dataRating)
        ];


        return view('admin::index',$viewData,$viewData1);
    }
}
