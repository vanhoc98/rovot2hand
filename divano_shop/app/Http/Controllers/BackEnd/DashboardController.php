<?php

namespace App\Http\Controllers\BackEnd;

use App\Customer;
use App\User;
use App\Order;
use App\Product;
use Carbon\Carbon;
use App\OrderDetail;
use App\Statistical;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SebastianBergmann\CliParser\Exception;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub40ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(40)->toDateString();
        $startmonth = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $endmonth = Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $startlastmonth = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->subMonth()->toDateString();
        $endlastmonth = Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString();

        //Your Earnings
        $totalLastMonth = Statistical::whereBetween('order_date', [$startlastmonth,$endlastmonth])->sum('sales');
        $orderEar = OrderDetail::whereBetween('created_at', [$startlastmonth,$endlastmonth])->get();


        $series = [];
        $labels = [];
        $product = Product::select('product_id')->get();
        $OrCount = $orderEar->count();

        foreach($orderEar as $key => $ear){
            $labels[] = ucfirst(Product::find($ear->pro_id)->product_name);
            $countId = OrderDetail::where('pro_id',$ear->pro_id)->count();
            $series[] = round(  ($countId/$OrCount)*100  );
        }


        //Bar & REVENUE
        $sum = Statistical::whereBetween('order_date', [$startmonth,$now])->sum('sales');
        $sumprofit = Statistical::whereBetween('order_date', [$startmonth,$now])->sum('profit');
        $data = Statistical::whereBetween('order_date', [$sub40ngay,$now])->get();
        $months = [];
        $monthsCount = [];
        $revenue = [];
        foreach ($data as $value) {
            $months[] = Carbon::parse($value->order_date)->format('M jS');
            $monthsCount[] = $value->sales;
            $revenue[] = $value->profit;

        }
        //Order
        $order = OrderDetail::whereBetween('created_at', [$startmonth,$endmonth])->get();
        $orderSum = OrderDetail::whereBetween('created_at', [$startmonth,$endmonth])->sum('order_de_qty');

        $months2 = [];
        $countTotal = [];
        foreach ($order as $value) {
            $months2[] = Carbon::parse($value->created_at)->format('M jS');
            $countTotal[] = $value->order_de_qty;
        }

        //User
        $user = User::select('created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M jS');
        });
        $userCount = User::all()->count();
        $months3 = [];
        $countTotal3 = [];
        foreach ($user as $month => $value) {
            $months3[] = $month;
            $countTotal3[] = count($value);
        }

        //Sales today
        $orderToday = OrderDetail::whereDate('created_at', $now)->get();
        $orderTodaySum = OrderDetail::whereDate('created_at', $now)->sum('order_de_qty');

        $months4 = [];
        $countTotal4 = [];
        foreach ($orderToday as $value) {
            $months4[] = Carbon::parse($value->created_at)->format('M jS h:i');
            $countTotal4[] = $value->order_de_qty;
        }

        $TableOrder = Order::whereDate('created_at',$now)->get();


        return view('Admin.Dashboard', compact('TableOrder','labels','series','totalLastMonth','sumprofit','months','monthsCount','revenue','months2','months3','countTotal3','months4','countTotal4','orderTodaySum','countTotal','data','sum','orderSum','user','userCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->ajax()){
            $data = Str::slug(request()->keyword);
            return response()->json($data);
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
        if($request->hasFile("upload")){
            $file_name = $request->file("upload");
            $new_image_name = uniqid().'.'.$file_name->getClientOriginalExtension();

            $file_name->move(public_path('uploads/ckeditor'),$new_image_name);
            $function_number = $request->input('CKEditorFuncNum');
            $url = asset('uploads/ckeditor/'.$new_image_name);
            $message = '';
            $reponse = "<script>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";

            @header('Content-type: text/html; charset-utf-8');
            echo $reponse;


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
