<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    // thêm giỏ hàng
    public function addProduct(Request $request,$id){
        $product = Product::find($id);
        if(!$product) return redirect('/');
        $price = $product->pro_price;
        if($product->pro_sale){
            $price = $price*(100-$product->pro_sale)/100;
        }
        if($product->pro_number == 1){
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng!!');
        }
        \Cart::add(array(
            'id' => $id,
            'name' => $product->pro_name,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'avatar'    => $product->pro_avatar,
                'sale' => $product->pro_sale,
                'price_old' => $product->pro_price
            )
        ));
        return redirect()->back();
    }
    // lấy danh sách giỏ hàng
    public function getListShoppingCart(){
        $products = \Cart::getContent();
        return view('shopping.index',compact('products'));
    }
    //thanh toán
    public function getFormPay(){
        $products = \Cart::getContent();
        return view('shopping.pay',compact('products'));
    }
    // Xóa sản phẩm trong giỏ
    public function deleteProductItem($key){
        \Cart::remove($key);
        return redirect()->back();
    }
    //lưu thông tin thanh toán
    public function saveInfoShoppingCart(Request $request){
        $totalMoney = \Cart::getTotal();
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total'  =>  $totalMoney,
            'tr_note'   =>  $request->note,
            'tr_address'=>  $request->address,
            'tr_phone'  =>  $request->phone,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        if($transactionId){
            $products = \Cart::getContent();
            foreach ($products as $product){
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id'     =>  $product->id,
                    'or_qty'            =>  $product->quantity,
                    'or_price'          =>  $product->attributes->price_old,
                    'or_sale'           =>  $product->attributes->sale
                ]);
            }
        }
        \Cart::clear();
        return redirect()->route('home');
    }
}
