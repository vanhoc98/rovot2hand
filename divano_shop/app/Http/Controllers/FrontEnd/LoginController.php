<?php

namespace App\Http\Controllers\FrontEnd;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.login');
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
            if($request->action == 'SignIn'){

                $check= array('email'=>$request->email, 'password'=>$request->pass);

                if(Auth::attempt($check)){
                    if (Auth::user()->level == 2) {

                        return response()->json([
                            'status'=>200,
                            'level'=>Auth::user()->level,
                            'message'=>'Sign In Success!'
                        ]);
                    }else{
                        return response()->json([
                            'status'=>200,
                            'level'=>Auth::user()->level,
                            'url'=>route('dashboard.index'),
                            'message'=>'Sign In Success!'
                        ]);
                    }
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Email Or Password Invalid!'
                    ]);
                }
            }else{
                $user = User::where('email',$request->email)->first();
                if($user){
                    return response()->json([
                        'status'=>400,
                        'message'=>'Email Address already Exists'
                    ]);
                }else{
                    $user = new User();
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->pass);
                    $user->level = 2;
                    $user->save();

                    Auth::login($user,true);
                    return response()->json([
                        'status'=>200,
                        'level'=>2,
                        'message'=>'Create Account Thành công!',
                        'url'=>route('home.index')
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
