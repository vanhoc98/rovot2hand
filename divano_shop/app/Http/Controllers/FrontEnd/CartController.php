<?php

namespace App\Http\Controllers\FrontEnd;

use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            if(Auth::check()){
                $output = '';
                $total = 0;
                $subtotal = 0;
                $status = request()->url == route('pay-cart.create') ? 2 : 1;
                $carts = Cart::join('product','cart.pro_id','product.product_id')
                            ->where([['cart_status',$status],['user_id',Auth::id()]])->get();
                foreach($carts as $cart){
                    $subtotal += $cart->cart_qty * $cart->product_price;
                    $cate = Category::find($cart->category_id);

                    if(Session::get('coupon')){
                        foreach(Session::get('coupon') as $coupon){
                            if($coupon['coupon_condition'] == 2){
                                $discount = $coupon['coupon_number'].'%';
                                $subcoupon = $subtotal*($coupon['coupon_number']/100);
                                $total = $subtotal - $subcoupon;
                            }else{
                                $discount = '';
                                $subcoupon = $coupon['coupon_number'];
                                $total = $subtotal - $coupon['coupon_number'];
                            }
                        }
                    }else{
                        $total = $subtotal;
                        $discount = '';
                        $subcoupon = 0;
                    }
                    $output.='
                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="'.asset('uploads/product/'.$cart->product_image).'" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="'.route('product.show',$cart->product_slug).'">'.ucfirst($cart->product_name).'</a></div>
                                <div>'.ucfirst($cate->category_name).'</div>
                            </div>
                            <div class="quantity">';
                            if(request()->url == route('cart.index')){
                                $output.='<input type="number" id="#qty'.$cart->cart_id.'" data-cart_id="'.$cart->cart_id.'" value="'.$cart->cart_qty.'" oninput="this.value = Math.abs(this.value)" class="form-control form-quantity updateqtycart" />';
                            }else{
                                $output.='<input type="number" readonly value="'.$cart->cart_qty.'" oninput="this.value = Math.abs(this.value)" class="form-control form-quantity" />';
                            }
                            $output.='
                            </div>
                            <div class="price">';
                                if($cart->product_old_price != 0){
                                    $output.='
                                    <span class="final h3">'.number_format($cart->product_price).' vnđ</span>
                                    <span class="discount">'.number_format($cart->product_old_price).' vnđ</span>
                                    ';
                                }else{
                                    $output.='<span class="final h3">'.number_format($cart->product_price).' vnđ</span>';
                                }
                                $output.='
                            </div>
                            <!--delete-this-item-->';
                            if(request()->url == route('cart.index')){
                            $output.='<span data-cart_id="'.$cart->cart_id.'" class="icon icon-cross icon-delete delete_cart"></span>';
                            }
                            $output.='
                        </div>
                    ';
                }
                $cart_order = [
                    'count' => $carts->count(),
                    'total' => $total,
                ];
                Session::put('cart_order',$cart_order);

                return response()->json([
                    'data'=>$output,
                    'discount'=>$discount,
                    'discount_price'=>number_format($subcoupon),
                    'total_price'=>number_format($total).' vnđ'
                ]);
            }
        }
        $carts = Cart::join('product','cart.pro_id','product.product_id')
                            ->where([['cart_status',1],['user_id',Auth::id()]])->count();
        return view('User.Cart.cart_item', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.Cart.cart_deli');
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
            if(Auth::check()){
                $cart = Cart::where([['pro_id',$request->id],['cart_status',1]])->first();
                if(!$cart){
                    $cart = new Cart();
                    $cart->pro_id = $request->id;
                    $cart->user_id = Auth::id();
                    $cart->cart_qty = $request->qty;
                    $cart->cart_status = 1;
                    $cart->save();
                }else{
                    $cart->cart_qty = $cart->cart_qty + $request->qty;
                    $cart->save();
                }

                return response()->json([
                    'status'=>200,
                    'message'=>'Thành công'
                ]);
            }else{
                return response()->json([
                    'status'=>400,
                    'url'=>route('login.index')
                ]);
            }
        }
        $customer = array(
            'name_cart' => $request->name_cart,
            'phone_cart' => $request->phone_cart,
            'email_cart' => $request->email_cart,
            'address_cart' => $request->address_cart,
            'note_cart' => $request->note_cart,
        );
        Session::put('customer_cart',$customer);

        return redirect()->route('pay-cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        if(request()->ajax()){
            $cart = Cart::findOrfail($id);
            if($cart){
                $cart->cart_qty = $request->qty;
                $cart->save();

                return response()->json([
                    'status'=>200
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Data Not Found'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->ajax()){
            $cart = Cart::findOrfail($id);
            if($cart){
                $cart->delete();

                return response()->json([
                    'status'=>200
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Data Not Found'
                ]);
            }
        }
    }
}
