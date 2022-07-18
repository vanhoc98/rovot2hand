<?php

namespace App\Http\Controllers\BackEnd;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class M_AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(User::join('role','role.role_id','users.level')->orderBy('id','desc')->get())
                ->addColumn('action', function($data){
                    $button = '<button type="button" data-id="'.$data->id .'" data-action="Edit" class="btn icon btn-sm btn-outline-warning actionsample"><i class="fas fa-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" class="btn icon btn-sm btn-outline-danger actionsample" data-action="Del" data-id="'.$data->id .'"><i class="fas fa-trash-alt"></i>
                            </button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Tài khoản';
        $roles = Role::all();
        return view('Admin.M_Account', compact('title','roles'));
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
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'level'=>'required',
                'password'=>'required',
                'email'=>'required|email|unique:users,email',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages(),
                ]);
            }else{
                $users = new User();
                $users->name = $request->name;
                $users->email = $request->email;
                $users->level = $request->level;
                $users->password = $request->password;
                $users->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'Thành công!'
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
        if(request()->ajax()){
            $users = User::findOrfail($id);
            if($users){
                return response()->json([
                    'status'=>200,
                    'data'=>$users,
                    'action'=>request()->action
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
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'level'=>'required',
                'repassword'=>'same:password',
                'email'=>'required|email|unique:users,email',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages(),
                ]);
            }else{
                $users = User::findOrfail($id);
                $users->name = $request->name;
                $users->email = $request->email;
                $users->level = $request->level;
                if($request->password != ''){
                    $users->password = $request->password;
                }
                $users->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'Thành công!'
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
        $sample = User::findOrfail($id);
        if($sample){
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
