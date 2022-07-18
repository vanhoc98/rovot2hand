<?php

namespace App\Http\Controllers\FrontEnd;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.about');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('home.index');
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
            $data = $request->all();

            $today_d =  Carbon::now('Asia/Ho_Chi_Minh')->format('d');
            $today_m =  Carbon::now('Asia/Ho_Chi_Minh')->format('m');
            $today_y =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y');
            if (Auth::user()) {
                $date_coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status',1)->first();
                if ($date_coupon) {
                    $create = date_create($date_coupon->coupon_date_end);
                    $day = date_format($create,'d');
                    $month = date_format($create,'m');
                    $year = date_format($create,'Y');

                    if ($month > $today_m && $year >= $today_y) {
                        $used_coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status',1)->where('coupon_used', 'LIKE', '%'.Auth::id().'%')->first();
                    }else if($month == $today_m && $year == $today_y){
                        if ($day >= $today_d) {
                            $used_coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status',1)->where('coupon_used', 'LIKE', '%'.Auth::id().'%')->first();
                        }else{
                            return response()->json(['error'=>'The discount code is incorrect or has expired']);
                        }
                    }else{
                        return response()->json(['error'=>'The discount code is incorrect or has expired']);
                    }



                }else{
                    return response()->json(['error'=>'The discount code is incorrect or has expired']);
                }
            }else{
                return response()->json([
                    'url'=>route('login.index'),
                    'error_login'=>'Please login to use discount code!'
                ]);
            }

            if ($used_coupon) {
                return response()->json(['error'=>'Discount code already used, please enter another code']);
            }else{
                $date_coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status',1)->first();
                $create_date = date_create($date_coupon->coupon_date_end);
                $day = date_format($create_date,'d');
                $month = date_format($create_date,'m');
                $year = date_format($create_date,'Y');
                if ($month > $today_m && $year >= $today_y) {
                    $coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status',1)->first();
                }else if($month == $today_m && $year == $today_y){
                    if ($day >= $today_d) {
                        $coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status',1)->first();
                    }else{
                        return response()->json(['error'=>'The discount code is incorrect or has expired']);
                    }
                }else{
                    return response()->json(['error'=>'The discount code is incorrect or has expired']);
                }

                if ($coupon) {
                    $coupon_count = $coupon->count();
                    if ($coupon_count>0) {
                        $coupon_session = Session::get('coupon');
                        if ($coupon_session==true) {
                            $is_avaiable = 0;
                            if ($is_avaiable==0) {
                                $coun[] = array(
                                    'coupon_code' => $coupon->coupon_code,
                                    'coupon_condition' => $coupon->coupon_condition,
                                    'coupon_number' => $coupon->coupon_sale_number,
                                );
                                Session::put('coupon',$coun);
                            }
                        }else{
                            $coun[] = array(
                                    'coupon_code' => $coupon->coupon_code,
                                    'coupon_condition' => $coupon->coupon_condition,
                                    'coupon_number' => $coupon->coupon_sale_number,
                                );
                            Session::put('coupon',$coun);
                        }
                        Session::save();

                        return response()->json(['message'=>'Add Coupon Thành công']);

                    }
                }else{
                    return response()->json(['error'=>'The discount code is incorrect or has expired']);
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
