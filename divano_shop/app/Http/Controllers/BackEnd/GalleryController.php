<?php

namespace App\Http\Controllers\BackEnd;

use App\Blog;
use App\Coupon;
use App\Slider;
use App\Gallery;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $gallery = Gallery::where('pro_id',$request->id)->orderBy('gallery_sorting','asc')->get();
            $output = '';
            foreach($gallery as $gal){
                $output .='
                <tr id="'.$gal->gallery_id.'">
                    <td>'.$gal->gallery_sorting.'</td>
                    <td class="col-6">
                        <img src="'.url('uploads/gallery/'.$gal->gallery_image).'" width="90px" height="80px" class="img-thumbnail" />
                        <input type="file" data-url="'.route('gallery.update',$gal->gallery_id).'" class="file_image form-control mt-1" style="width: 61%;" name="file" data-gal_id="'.$gal->gallery_id.'" id="file-'.$gal->gallery_id.'" accept="image/*" multiple="">
                    </td>
                    <td><button type="button" class="btn btn-outline-danger delete_gal" data-action="One" data-url="'.route('gallery.destroy',$gal->gallery_id).'" data-id="'.$gal->gallery_id.'"><i class="fa fa-trash"></i>
                    </button></td>
                </tr>
                ';
            }

            return response()->json([
                'data'=>$output
            ]);
        }
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
        if($request->ajax()){
            if($request->action == 'category'){
                $sample = Category::findOrfail($request->id);
                if($sample){
                    if($request->statusss == 1){
                        $sample->category_status = 1;
                    }else{
                        $sample->category_status = 2;
                    }
                    $sample->save();

                    return response()->json([
                        'status'=>200,
                        'message'=>'Change Status Thành công!'
                    ]);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Data Not Found!'
                    ]);
                }
            }

            if($request->action == 'product'){
                $sample = Product::findOrfail($request->id);
                if($sample){
                    if($request->statusss == 1){
                        $sample->product_status = 1;
                    }else{
                        $sample->product_status = 2;
                    }
                    $sample->save();

                    return response()->json([
                        'status'=>200,
                        'message'=>'Change Status Thành công!'
                    ]);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Data Not Found!'
                    ]);
                }
            }

            if($request->action == 'coupon'){
                $sample = Coupon::findOrfail($request->id);
                if($sample){
                    if($request->statusss == 1){
                        $sample->coupon_status = 1;
                    }else{
                        $sample->coupon_status = 2;
                    }
                    $sample->save();

                    return response()->json([
                        'status'=>200,
                        'message'=>'Change Status Thành công!'
                    ]);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Data Not Found!'
                    ]);
                }
            }

            if($request->action == 'slider'){
                $sample = Slider::findOrfail($request->id);
                if($sample){
                    if($request->statusss == 1){
                        $sample->slider_status = 1;
                    }else{
                        $sample->slider_status = 2;
                    }
                    $sample->save();

                    return response()->json([
                        'status'=>200,
                        'message'=>'Change Status Thành công!'
                    ]);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Data Not Found!'
                    ]);
                }
            }

            if($request->action == 'blog'){
                $sample = Blog::findOrfail($request->id);
                if($sample){
                    if($request->statusss == 1){
                        $sample->blog_status = 1;
                    }else{
                        $sample->blog_status = 2;
                    }
                    $sample->save();

                    return response()->json([
                        'status'=>200,
                        'message'=>'Change Status Thành công!'
                    ]);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Data Not Found!'
                    ]);
                }
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
        $pro_id = $id;
        Session::put('gallery_session',$pro_id);
        if (Session::get('gallery_session')) {
          $name_product = Product::where('product_id',Session::get('gallery_session'))->first();
        }
        if ($name_product) {
          return view('Admin.M_Gallery',compact('pro_id','name_product'));
        }

        return view('Admin.M_Gallery',compact('pro_id'));
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
            if($request->action == 'Add'){
                $get_img = $request->file('gall_image');
                if ($get_img) {
                    foreach ($get_img as $key => $image) {
                        $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();

                        $image_resize = Image::make($image->getRealPath());
                        $image_resize->resize(563, 563);
                        $image_resize->save(public_path('uploads/gallery/' .$name));

                        $gallery = new Gallery();
                        $gallery->gallery_image = $name;
                        $gallery->pro_id = $request->id_pro;
                        $gallery->gallery_sorting = count(Gallery::all())+1;
                        $gallery->save();
                    }
                    return response()->json([
                        'status'=>200,
                        'message'=>'Add Thành công'
                    ]);
                }
            }else{
                $gallery = Gallery::find($id);
                if($gallery){
                    $image = $request->file('file');
                    if($image){
                        unlink(public_path('uploads/gallery/').$gallery->gallery_image);
                        $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
                        $image_resize = Image::make($image->getRealPath());
                        $image_resize->resize(563, 563);
                        $image_resize->save(public_path('uploads/gallery/' .$name));
                        $gallery->gallery_image = $name;
                        $gallery->save();
                    }

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
            if(request()->action == 'One'){
                $one = Gallery::findOrfail(request()->idGall);

                if($one){
                    unlink(public_path('uploads/gallery/').$one->gallery_image);
                    $one->delete();

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
            }else{
                $all = Gallery::where('pro_id',$id)->get();
                if(count($all) > 0){
                    foreach($all as $al){
                        unlink(public_path('uploads/gallery/').$al->gallery_image);
                        $al->delete();
                    }
                    return response()->json([
                        'status'=>200,
                        'message'=>'Delete Thành công'
                    ]);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Data Required'
                    ]);
                }
            }
        }
    }
}
