<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        if ($id = array_pop($url)) {
            $productDetail = Product::with('category:id,c_name')->where([
                'id' => $id,
                'pro_active' => Product::STATUS_PUBLIC
            ])->first();
            $ratings=Rating::with('user:id,name')
                ->where('ra_product_id',$id)
                ->orderBy('id','DESC')
                ->paginate(5);
            $ratingsDashboard = Rating::groupBy('ra_number')
                ->where('ra_product_id',$id)
                ->select(DB::raw('count(ra_number) as total'),DB::raw('sum(ra_number) as sum'))
                ->addSelect('ra_number')
                ->get()->toArray();
            $arrayratings =[];
            if(!empty($ratingsDashboard)){
                for ($i =1;$i<=5;$i++){
                    $arrayratings[$i] =[
                        "total" => 0,
                        "sum"   => 0,
                        "ra_number"=>0
                    ];
                    foreach ($ratingsDashboard as $item){
                        if($item['ra_number'] == $i){
                            $arrayratings[$i] = $item;
                            continue;
                        }
                    }
                }
            }
            $productSame = Product::where([
                'pro_category_id' => $productDetail->pro_category_id
            ])->limit(4)->get();
            $viewData = [
                'productDetail' => $productDetail,
                'productSame' => $productSame,
                'ratings'=>$ratings,
                'arrayratings'=>$arrayratings
            ];
            return view('product.detail', $viewData);
        }
    }
}
