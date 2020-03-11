<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;


class HomeController extends Controller
{
    public function index(){
        $categories = category::all();
        $products   = Product::paginate(9);
        $articles    = article::all();
        $productHot = Product::where([
            'pro_hot'   =>  Product::HOT_ON,
            'pro_active'  =>    Product::STATUS_PUBLIC
        ])->limit(4)->get();
        $productNew = Product::where([
            'pro_hot'   =>  Product::HOT_ON,
            'pro_active'  =>    Product::STATUS_PUBLIC
        ])->orderByDesc('id')->limit(4)->get();
        $viewData =[
            'categories'=>$categories,
            'products'  =>$products,
            'productHot'=>$productHot,
            'articles'   =>$articles,
            'productNew' =>$productNew
        ];
        return view('home.index',$viewData);
    }
    public function shop(Request $request){
        $categories = category::all();
        $products = Product::where([
            'pro_active' => Product::STATUS_PUBLIC
        ]);
        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $products->where('pro_price', '<', 1000000);
                    break;
                case '2':
                    $products->whereBetween('pro_price',[1000000,5000000]);
                    break;
                case '3':
                    $products->whereBetween('pro_price',[5000000,10000000]);
                    break;
                case '4':
                    $products->where('pro_price', '>', 10000000);
                    break;
            }
        }
        if ($request->orderBy) {
            $orderby = $request->orderBy;
            switch ($orderby) {
                case 'latest':
                    $products->orderBy('id', 'DESC');
                    break;
                case 'old':
                    $products->orderBy('id', 'ASC');
                    break;
                case 'price':
                    $products->orderBy('pro_price', 'ASC');
                    break;
            }
        }
        $products = $products->orderBy('id', 'DESC')->paginate(6);
        $productHot = Product::where([
            'pro_hot'   =>  Product::HOT_ON,
            'pro_active'  =>    Product::STATUS_PUBLIC
        ])->paginate(3);
        $productNew = Product::where([
            'pro_hot'   =>  Product::HOT_ON,
            'pro_active'  =>    Product::STATUS_PUBLIC
        ])->orderByDesc('id')->limit(4)->get();
        $viewData =[
            'categories'=>$categories,
            'products'  =>$products,
            'productHot'=>$productHot,
            'productNew' =>$productNew
        ];
        return view('home.shop',$viewData);
    }
    public function news(){
        $articles    = article::paginate(5);
        $articleHot = article::all()->sortByDesc('a_view');
        $articleNew = article::all()->sortByDesc('created_at');
        $viewData =[
            'articles'   =>$articles,
            'articleNew'    =>$articleNew,
            'articleHot'    =>$articleHot
        ];
        return view('home.news',$viewData);
    }
    public function search(Request $request){
        $categories = category::all();
        $products = Product::with('category:id,c_name');
        if ($request->name) $products->where('pro_name', 'like', '%' . $request->name . '%');
        $products = $products->orderByDesc('id')->paginate(3);
        $productHot = Product::where([
            'pro_hot'   =>  Product::HOT_ON,
            'pro_active'  =>    Product::STATUS_PUBLIC
        ]);
        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $productHot->where('pro_price', '<', 1000000);
                    break;
                case '2':
                    $productHot->whereBetween('pro_price',[1000000,5000000]);
                    break;
                case '3':
                    $productHot->whereBetween('pro_price',[5000000,10000000]);
                    break;
                case '4':
                    $productHot->where('pro_price', '>', 10000000);
                    break;
            }
        }
        if ($request->orderBy) {
            $orderby = $request->orderBy;
            switch ($orderby) {
                case 'latest':
                    $productHot->orderBy('id', 'DESC');
                    break;
                case 'old':
                    $productHot->orderBy('id', 'ASC');
                    break;
                case 'price':
                    $productHot->orderBy('pro_price', 'ASC');
                    break;
            }
        }
        $productHot = $productHot->orderBy('id', 'DESC')->paginate(3);
        $productNew = Product::where([
            'pro_hot'   =>  Product::HOT_ON,
            'pro_active'  =>    Product::STATUS_PUBLIC
        ])->orderByDesc('id')->limit(4)->get();
        $viewData =[
            'categories'=>$categories,
            'products'  =>$products,
            'productHot'=>$productHot,
            'productNew' =>$productNew
        ];
        return view('search', $viewData);
    }

}
