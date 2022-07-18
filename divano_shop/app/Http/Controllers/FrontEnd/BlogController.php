<?php

namespace App\Http\Controllers\FrontEnd;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        $blogs = Blog::where('blog_status',1)->orderby('blog_id','desc')->paginate($this->page);
        $detail = '';
        return view('User.Blog.blog', compact('blogs','detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->ajax()){
            $blogs = Blog::where('blog_status',1)->orderby('blog_id','desc')->paginate($this->page);
            $detail = '';

            return view('User.Blog.blog_pa', compact('blogs','detail'))->render();
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
        $detail = Blog::find($id);
        $next = Blog::where([['blog_status',1],['blog_id',$id+1]])->first();
        $prev = Blog::where([['blog_status',1],['blog_id',$id-1]])->first();

        $detail->blog_view = $detail->blog_view+1;
        $detail->save();

        return view('User.Blog.blog_detail', compact('detail','next','prev'));
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
