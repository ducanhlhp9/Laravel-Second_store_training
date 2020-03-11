<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if ($id = array_pop($url)) {
            $products = Product::where([
                'pro_category_id' => $id,
                'pro_active' => Product::STATUS_PUBLIC
            ]);
            if ($request->price) {
                $price = $request->price;
                switch ($price) {
                    case '1':
                        $products->where('pro_price', '<', 1000000);
                        break;
                    case '2':
                        $products->whereBetween('pro_price', [1000000, 5000000]);
                        break;
                    case '3':
                        $products->whereBetween('pro_price', [5000000, 10000000]);
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

            $categories = category::where([
                'id' => $id
            ])->get();
            $productNew = Product::where([
                'pro_hot' => Product::HOT_ON,
                'pro_active' => Product::STATUS_PUBLIC
            ])->orderByDesc('id')->limit(4)->get();
            $viewData = [
                'products' => $products,
                'categories' => $categories,
                'productNew' => $productNew
            ];

            return view('product.index', $viewData);
        }
        return redirect('/');
    }
}
