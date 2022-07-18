<?php

namespace App\Http\Controllers\BackEnd;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class M_BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(Blog::join('category','blog.blog_cate','category.category_id')->orderBy('blog_id','desc')->get())
                ->addColumn('action', function($data){
                    $button = '<button type="button" data-id="'.$data->blog_id .'" data-action="Edit" class="btn icon btn-sm btn-outline-warning actionsample"><i class="fas fa-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" class="btn icon btn-sm btn-outline-danger actionsample" data-action="Del" data-id="'.$data->blog_id .'"><i class="fas fa-trash-alt"></i>
                            </button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Blog';
        $category = Category::all();
        return view('Admin.M_Blog', compact('title','category'));
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
        if($request->ajax()){
            $blog = new Blog();
            $blog->blog_title = $request->blog_title;
            $blog->blog_desc = $request->blog_desc;
            $blog->blog_cate = $request->blog_cate;
            $blog->blog_status = $request->blog_status;
            $blog->blog_content = $request->blog_content;
            $blog->blog_view = 0;

            if ($request->file('blog_image')) {
                $image = $request->file('blog_image');
                $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();

                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(760, 600);
                $image_resize->save(public_path('uploads/blog/' .$name));

                $blog->blog_image = $name;
            }
            $blog->save();

            return response()->json([
                'status'=>200,
                'message'=>'Add Thành công'
            ]);
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
        if(request()->ajax()){
            $sample = Blog::findOrfail($id);
            if($sample){
                return response()->json([
                    'status'=>200,
                    'data'=>$sample
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
        if($request->ajax()){
            $blog = Blog::findOrfail($id);
            if($blog){
                $blog->blog_title = $request->blog_title;
                $blog->blog_desc = $request->blog_desc;
                $blog->blog_cate = $request->blog_cate;
                $blog->blog_status = $request->blog_status;
                $blog->blog_content = $request->blog_content;

                if ($request->file('blog_image')) {
                    unlink(public_path('uploads/blog/').$blog->blog_image);
                    $image = $request->file('blog_image');
                    $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();

                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(760, 600);
                    $image_resize->save(public_path('uploads/blog/' .$name));

                    $blog->blog_image = $name;
                }
                $blog->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'Update Thành công'
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
        $sample = Blog::findOrfail($id);
        if($sample){
            unlink(public_path('uploads/blog/').$sample->blog_image);
            $sample->delete();

            return response()->json([
                'status'=>200,
                'message'=>'Delete Thành công'
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Data Not Found'
            ]);
        }
    }
}
