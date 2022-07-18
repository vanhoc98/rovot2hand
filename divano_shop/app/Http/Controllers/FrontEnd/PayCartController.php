<?php

namespace App\Http\Controllers\FrontEnd;

use App\Cart;
use App\Order;
use App\Coupon;
use App\Customer;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PayCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('customer_cart')){
            $carts = Cart::join('product','cart.pro_id','product.product_id')
                                ->where([['cart_status',1],['user_id',Auth::id()]])->get();
            return view('User.Cart.cart_pay', compact('carts'));
        }else{
            return redirect()->route('cart.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get('success')){

            return view('User.Cart.cart_rece');
        }else{
            return redirect()->route('pay-cart.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $code = mt_rand();

            $carts = Cart::join('product','cart.pro_id','product.product_id')
                            ->where([['cart_status',1],['user_id',Auth::id()]])->get();
            if($carts->count() > 0){
                $customer = new Customer();
                $customer->customer_name = Session::get('customer_cart')['name_cart'];
                $customer->customer_email = Session::get('customer_cart')['email_cart'];
                $customer->customer_address = Session::get('customer_cart')['address_cart'];
                $customer->customer_phone = Session::get('customer_cart')['phone_cart'];
                $customer->customer_pay = $request->action;
                $customer->customer_note = Session::get('customer_cart')['note_cart'];
                $customer->save();

                $order = new Order();
                $order->cus_id = $customer->customer_id;
                $order->user_id = Auth::id();
                $order->order_code = $code;
                $order->order_status = 1;
                $order->save();

                foreach($carts as $cart){
                    $orderdetail = new OrderDetail();
                    $orderdetail->order_code = $code;
                    $orderdetail->pro_id  = $cart->pro_id;
                    $orderdetail->order_de_price  = $cart->product_price;
                    $orderdetail->order_de_qty  = $cart->cart_qty;

                    if(Session::get('coupon')){
                        foreach(Session::get('coupon') as $coun){
                            $orderdetail->order_de_coupon  = $coun['coupon_code'];
                            $coupon_qty = Coupon::where('coupon_code',$coun['coupon_code'])->first();
                            $coupon_qty->coupon_used = ','.Auth::id();
                            $coupon_qty->coupon_qty--;
                            $coupon_qty->save();
                        }
                    }else{
                        $orderdetail->order_de_coupon  = 'no';
                    }

                    $orderdetail->save();

                    $status = Cart::where('cart_id',$cart->cart_id)->first();
                    $status->cart_status = 2;
                    $status->save();
                }
                Session::forget('coupon');
                Session::put('success','success');

                return response()->json([
                    'status'=>200,
                    'url'=>route('pay-cart.create')
                ]);
            }else{
                return response()->json([
                    'status'=>400,
                    'url'=>route('home.index')
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
