<?php

namespace App\Http\Controllers\BackEnd;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class M_SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(Slider::orderBy('slider_sorting','asc')->get())
                ->addColumn('action', function($data){
                    $button = '<button type="button" data-id="'.$data->slider_id .'"  data-action="Edit" class="btn icon btn-sm btn-outline-warning actionsample"><i class="fa fa-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-action="Del" class="btn icon btn-sm btn-outline-danger actionsample" data-id="'.$data->slider_id .'"><i class="fa fa-trash"></i>
                            </button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Slider';
        return view('Admin.M_Slider', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->ajax()){
            if (request()->slider_id_array) {

                foreach (request()->slider_id_array as $key => $value) {
                    $sorting = Slider::findOrfail($value);
                    $sorting->slider_sorting = $key+1;
                    $sorting->save();
                }
            }
            return response()->json([
                'message' => 'Sorting Thành công !'
            ]);
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
        if(request()->ajax()){
            $slider = new Slider();
            $slider->slider_title = $request->slider_title;
            $slider->slider_content = $request->slider_content;
            $slider->slider_url = $request->slider_url;
            $slider->slider_bodytext = $request->slider_bodytext;
            $slider->slider_status = $request->slider_status;
            $slider->slider_sorting = count(Slider::all())+1;

            if ($request->file('slider_image')) {
                $image = $request->file('slider_image');
                $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();

                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1920, 1200);
                $image_resize->save(public_path('uploads/slider/' .$name));

                $slider->slider_image = $name;
            }

            $slider->save();

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
            $sample = Slider::findOrfail($id);
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
        if(request()->ajax()){
            $slider = Slider::findOrfail($id);
            if($slider){
                $slider->slider_title = $request->slider_title;
                $slider->slider_content = $request->slider_content;
                $slider->slider_url = $request->slider_url;
                $slider->slider_bodytext = $request->slider_bodytext;
                $slider->slider_status = $request->slider_status;

                if ($request->file('slider_image')) {
                    unlink(public_path('uploads/slider/').$slider->slider_image);
                    $image = $request->file('slider_image');
                    $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();

                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(1920, 1200);
                    $image_resize->save(public_path('uploads/slider/' .$name));

                    $slider->slider_image = $name;
                }

                $slider->save();

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
        $sample = Slider::findOrfail($id);
        if($sample){
            unlink(public_path('uploads/slider/').$sample->slider_image);
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
