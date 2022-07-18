<?php

namespace App\Http\Controllers\FrontEnd;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $output = '';

            if(Auth::check()){
                $wishlist = Wishlist::where('user_id',Auth::id())->get();
                $output .=''.count($wishlist).'';

                return response()->json([
                    'status'=>200,
                    'data'=>$output,
                    'wish'=>$wishlist
                ]);
            }else{

                return response()->json([
                    'status'=>404
                ]);
            }
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
            if(Auth::check()){
                $wishlist = Wishlist::where([['user_id',Auth::id()],['pro_id',$request->id]])->first();
                if($wishlist){
                    $wishlist->delete();

                    $action = 'del';
                    $message = '';
                }else{
                    $wishlist = new Wishlist();
                    $wishlist->user_id = Auth::id();
                    $wishlist->pro_id = $request->id;
                    $wishlist->save();

                    $action = 'add';
                    $message = 'Thêm danh sách yêu thích Thành công';
                }

                return response()->json([
                    'status'=>200,
                    'action'=>$action,
                    'message'=>$message
                ]);
            }else{
                return response()->json([
                    'status'=>400,
                    'url'=>route('login.index')
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
