<?php

namespace App\Http\Controllers\FrontEnd;

use App\Blog;
use App\Cart;
use App\Slider;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::forget('customer_cart');
        $sliders = Slider::where('slider_status',1)->get();
        $category = Category::where('category_status',1)->limit(3)->inRandomOrder()->get();
        $products = Product::where('product_status',1)->limit(6)->inRandomOrder()->get();
        $blogs = Blog::where('blog_status',1)->limit(3)->orderby('blog_id','desc')->get();

        return view('User.index', compact('sliders','category','products','blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->ajax()){
            // if(Auth::check()){
                $carts = Cart::join('product','cart.pro_id','product.product_id')
                                ->where([['user_id',Auth::id()],['cart_status',1]])->get();
                $output ='';
                $total = 0;
                if($carts){
                    $output.='
                        <div class="row">';
                            foreach($carts as $cart){
                                $total += $cart->cart_qty * $cart->product_price;
                                $category = Category::find($cart->category_id);
                                $output.='
                                <div class="cart-block cart-block-item clearfix">
                                    <div class="image">
                                        <a href="product.html"><img
                                                src="'. asset('uploads/product/'.$cart->product_image) .'"
                                                alt=""></a>
                                    </div>
                                    <div class="title">
                                        <div><a href="'.route('product.show',$cart->product_slug).'">'.ucfirst($cart->product_name).'</a></div>
                                        <small>'.ucfirst($category->category_name).'</small>
                                    </div>
                                    <div class="quantity">
                                        <input type="number" id="qty'.$cart->cart_id.'" data-cart_id="'.$cart->cart_id.'" oninput="this.value = Math.abs(this.value)"  value="'.$cart->cart_qty.'" class="form-control form-quantity updateqtycart">
                                    </div>
                                    <div class="price">';
                                        if($cart->product_old_price != 0){
                                            $output.='
                                                <span class="final">'.number_format($cart->product_price).'</span>
                                                <span class="discount">'.number_format($cart->product_old_price).'</span>
                                            ';
                                        }else{
                                            $output.='
                                                <span class="final">'.number_format($cart->product_price).'</span>
                                            ';
                                        }
                                        $output.='
                                    </div>
                                    <!--delete-this-item-->
                                    <span class="icon icon-cross icon-delete delete_cart" data-cart_id="'.$cart->cart_id.'"></span>
                                </div>
                                ';
                            }
                            $output.='
                        </div>

                        <hr>

                        <!--cart final price -->

                        <div class="clearfix">
                            <div class="cart-block cart-block-footer clearfix">
                                <div>
                                    <strong>Total</strong>
                                </div>
                                <div>
                                    <div class="h4 title">'.number_format($total).' vnđ</div>
                                </div>
                            </div>
                        </div>

                        <!--cart navigation -->

                        <div class="cart-block-buttons clearfix">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="javascrip:void(0)" class="btn btn-outline-info continue">Tiếp tục mua sắm</a>
                                </div>
                                <div class="col-sm-6 text-right">';
                                if(Auth::check()){
                                    $output.='<a href="'.route('cart.index').'" class="btn btn-outline-warning"><span
                                            class="icon icon-cart"></span> Kiểm tra thanh toán</a>';
                                }else{
                                    $output.='<a href="'.route('login.index').'" class="btn btn-outline-warning"><span
                                            class="icon icon-cart"></span> Kiểm tra thanh toán</a>';
                                }
                                $output.='
                                </div>
                            </div>
                        </div>
                    ';

                }

                return response()->json([
                    'output'=>$output,
                    'count'=>count($carts),
                ]);
            // }
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

            $product = Product::findOrfail($request->id);
            if($product){
                $name = ' '.$product->product_name.' ';
                $cate = ' '.$product->pro_cate->category_name.' ';
                $img = '<img src="'. asset('uploads/product/'.$product->product_image) .'" alt="" width="640" />';
                $price = '';
                if($product->product_old_price != 0){
                    $price.='<span class="h3">'.number_format($product->product_price).' <small>'.number_format($product->product_old_price).'</small></span>';
                }else{
                    $price.='<span class="h3">'.number_format($product->product_price).'</span>';
                }
                $btn = '
                    <a href="'.route('product.show',$product->product_slug).'"><span class="icon icon-eye"></span> <span
                                    class="hidden-xs">View
                                    more</span></a>
                    <input type="hidden" id="qty'. $product->product_id .'" value="1">
                    <a href="javascript:void(0);" class="addcart" data-cart_id="'. $product->product_id .'"><span class="icon icon-cart"></span> <span
                            class="hidden-xs">Buy</span></a>
                ';
                return response()->json([
                    'status'=>200,
                    'name'=>$name,
                    'cate'=>$cate,
                    'img'=>$img,
                    'price'=>$price,
                    'btn'=>$btn,
                ]);
            }else{
                return response()->json([
                    'status'=>400,
                    'message'=>'Data Not Found'
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
