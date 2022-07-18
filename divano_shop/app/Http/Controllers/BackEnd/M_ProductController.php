<?php

namespace App\Http\Controllers\BackEnd;

use App\Gallery;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class M_ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(Product::join('category','category.category_id','product.category_id')->orderBy('product_id','desc')->get())
                ->addColumn('action', function($data){
                    $button = '<button type="button" data-id="'.$data->product_id.'"  data-action="Edit" class="btn icon btn-sm btn-outline-warning actionsample"><i class="fa fa-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-action="Del" class="btn icon btn-sm btn-outline-danger actionsample" data-id="'.$data->product_id.'"><i class="fa fa-trash"></i>
                            </button>';
                    return $button;
                })
                ->addColumn('price_td', function($data){
                    if ($data->product_old_price > 0) {
                        $price = '<span class="text-info"><b>'.number_format($data->product_price).'</b></span>';
                    }else{
                        $price = '<span>'.number_format($data->product_price).'</span>';
                    }
                    return $price;
                })
                ->addColumn('image', function($data){
                    return '<img src="'.url('uploads/product/'.$data->product_image).'" width="80px" height="80px" class="img-thumbnail" />';
                })
                ->addColumn('gallery_td', function($data){
                    $gallery = Gallery::where('pro_id',$data->product_id)->get()->count();
                    if ($gallery > 5) {
                        $gall = '<a href="'.route('gallery.show',[$data->product_id]).'" class="badge bg-success click_gallery">Gallery ('.$gallery.')</a>';
                    }else if ($gallery >= 1 && $gallery <= 5) {
                        $gall = '<a href="'.route('gallery.show',[$data->product_id]).'" class="badge bg-warning click_gallery">Gallery ('.$gallery.')</a>';
                    }else{
                        $gall = '<a href="'.route('gallery.show',[$data->product_id]).'" class="badge bg-danger click_gallery">Gallery ('.$gallery.')</a>';
                    }
                    return $gall;
                })
                ->rawColumns(['action','price_td','image','gallery_td'])
                ->make(true);
        }
        $title = 'Sản phẩm';
        $category = Category::all();
        return view('Admin.M_Product', compact('title','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->ajax()){
            $product = new Product();
            $product->product_name = $request->pro_name;
            $product->product_slug = $request->pro_slug;
            $product->category_id  = $request->pro_cate;
            $product->product_desc = $request->pro_desc;

            $product->product_price = $request->pro_price;
            $product->product_old_price = 0;
            $product->product_quantity = $request->pro_qty;
            $product->product_view = 0;
            $product->product_sold = 0;
            $product->product_status = $request->pro_status;


            if ($request->file('pro_image')) {
                $image = $request->file('pro_image');
                $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();

                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(760, 600);
                $image_resize->save(public_path('uploads/product/' .$name));

                $product->product_image = $name;
            }

            $product->save();

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
        $sample = Product::findOrfail($id);
        if($sample){
            $size = explode(',',$sample->product_size);
            $color = explode(',',$sample->product_color);
            $infor = explode(',',$sample->product_info);
            return response()->json([
                'status'=>200,
                'data'=>$sample,
                'size'=>$size,
                'color'=>$color,
                'infor'=>$infor,
                'action'=>request()->action
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Data Not Found'
            ]);
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
        if(request()->ajax()){
            $product = Product::findOrfail($id);
            if($product){
                $product->product_name = $request->pro_name;
                $product->product_slug = $request->pro_slug;
                $product->category_id  = $request->pro_cate;
                $product->product_desc = $request->pro_desc;

                if($request->pro_price > $request->pro_old_price){
                    $product->product_old_price = 0;
                }else{
                    if($product->product_price != $request->pro_price){
                        $product->product_old_price = $request->pro_old_price;
                    }
                }

                $product->product_price = $request->pro_price;
                $product->product_quantity = $request->pro_qty;
                $product->product_status = $request->pro_status;


                if ($request->file('pro_image')) {
                    unlink(public_path('uploads/product/').$product->product_image);
                    $image = $request->file('pro_image');
                    $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();

                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(760, 600);
                    $image_resize->save(public_path('uploads/product/' .$name));

                    $product->product_image = $name;
                }

                $product->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'Add Thành công'
                ]);
            }
            else{
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
        $sample = Product::findOrfail($id);
        if($sample){
            unlink(public_path('uploads/product/').$sample->product_image);
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
