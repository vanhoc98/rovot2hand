<?php

namespace App\Http\Controllers\FrontEnd;

use App\Gallery;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->page = 6;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'All';
        $title = 'Sản phẩm phổ biến';
        $products = Product::where('product_status',1)->paginate(6);
        return view('User.allproduct', compact('products','action','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->ajax()){
            if(request()->action == 'All'){
                $products = Product::where('product_status',1)->paginate($this->page);
            }elseif(request()->action == 'Search'){
                $data = request()->search;
                $products = Product::where('product_status',1)->where('product_name','LIKE','%'.$data.'%')
                                    ->orWhere('product_price','LIKE','%'.$data.'%')
                                    ->paginate($this->page);
            }else{
                $products = Product::where('category_id',request()->id)->where('product_status',1)->paginate($this->page);
            }
            return view('User.all_include', compact('products'))->render();
        }
        $action = 'Search';
        $data = $_GET['txtsearch'];
        $title = 'Search "'.$data.'"';
        $select = $this->page;
        $products = Product::where('product_status',1)->where('product_name','LIKE','%'.$data.'%')
                                    ->orWhere('product_price','LIKE','%'.$data.'%')
                                    ->paginate($select);

        return view('User.allproduct', compact('products','action','title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Product::where('product_slug',$id)->orWhere('product_id',$id)->first();
        $gallery = Gallery::where('pro_id',$detail->product_id)->get();
        $products = Product::where([['product_status',1],['category_id',$detail->category_id]])->inRandomOrder()->limit(4)->get();
        return view('User.detail_pro', compact('detail','gallery','products'));
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
