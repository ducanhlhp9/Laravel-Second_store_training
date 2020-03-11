<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestTransaction;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::with('user:id,name');
        $transactions = $transactions->orderBy('id')->paginate(2);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index', $viewData);
    }

    public function viewOrder(Request $request, $id)
    {
        if ($request->ajax()) {
            $orders = Order::with('product')->where('or_transaction_id', $id)->get();
            $html = view('admin::component.order', compact('orders'))->render();
            return \response()->json($html);
        }
    }

    public function active($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id', $id)->get();
        if ($orders) {
            foreach ($orders as $order) {
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $product->or_qty;
                $product->pro_pay++;
                $product->save();
            }
        }
        \DB::table('users')->where('id', $transaction->user_id)->increment('total_pay');
        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();
        return redirect()->back()->with('success', 'Xử lý đơn hàng thành công!');
    }

    public function action($action, $id)
    {
        if ($action) {
            $transaction = Transaction::find($id);
            switch ($action) {
                case 'delete':
                    $transaction->delete();
                    break;
            }
        }
        return redirect()->back();
    }

}
