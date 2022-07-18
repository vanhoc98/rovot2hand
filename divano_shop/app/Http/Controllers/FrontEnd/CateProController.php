<?php

namespace App\Http\Controllers\FrontEnd;

use App\Blog;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CateProController extends Controller
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
        $category = Category::where('category_status',1)->get();
        return view('User.category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $cate = Category::where('category_slug',$id)->first();
        $title = $cate->category_name;
        if(isset($_GET['action'])){
            $blogs = Blog::where([['blog_status',1],['blog_cate',$cate->category_id]])->orderby('blog_id','desc')->paginate($this->page);
            $detail = '';
            return view('User.Blog.blog', compact('blogs','detail','title'));
        }else{
            $action = 'All';
            $products = Product::where([['product_status',1],['category_id',$cate->category_id]])->paginate($this->page);
            return view('User.allproduct', compact('products','action','title'));
        }
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
