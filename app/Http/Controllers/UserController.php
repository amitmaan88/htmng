<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    public $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Create a list page.
     *
     * @return void
     */
    public function index()
    {
        $records['data'] = User::all();
        $records['pageHeading'] = 'User Management';
        return view('user/index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $records['data'] = User::get();
        $records['pageHeading'] = 'User Management: Create';
        return view('user/create', $records);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        if (isset($request->cancel) && $request->cancel==1) {
            return redirect('/users');
        }

        $validator = Validator::make($params, [
            'name'   => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'user_type_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/users/create')->withErrors($validator)->withInput();
        }
        $profile_info = User::create($params);
        $profile_id = $profile_info->id;

        request()->session()->flash('message', 'User Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeSatus(Request $request)
    {
        if ($request->ajax()) {
            $user = $this->user->find($request->id);
            $user->changeField($request->all());
            return response()->json(['response'=>'Field saved successfully!', 'status'=>'success', 'code'=>'200', 'data'=>$saved->id]);
        }
        return response()->json(['status'=>'fail', 'code'=>'104']);
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
