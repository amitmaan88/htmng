<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\UserRepo;
use Validator;

class UserController extends Controller {

    public $userRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepo $user) {
        $this->userRepo = $user;
    }

    /**
     * Create a list page.
     * @param  \Illuminate\Http\Request  $request
     *
     * @return void
     */
    public function index(Request $request) {
        $params = $request->all();
        //print_r($params);
        $records['data'] = $this->userRepo->search($params);
        $records['s'] = $params['s']??'';
        $records['pageHeading'] = 'User Management';
        return view('user/index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //$records['data'] = $this->user->get();
        $records['pageHeading'] = 'User Management: Create';
        return view('user/create', $records);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $params = $request->all();

        $validator = Validator::make($params, [
                    'name' => 'required|max:255',
                    'user_type_id' => 'required',
                    'email' => 'required|unique:users|email',
                    'password' => 'required|confirmed|min:6|max:10',
                    'mobile' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect('/users/create')->withErrors($validator)->withInput();
        }
        
        $params['password'] = bcrypt($params['password']);
        unset($params['password_confirmation']);
        $profile_id = $this->userRepo->editAdd($params);

        request()->session()->flash('message', 'User Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request) {
        if ($request->ajax()) {
            $params['id'] = $request->id;
            $params['status'] = $request->status;
            $user = $this->userRepo->editAdd($params);
            return response()->json(['response' => 'Field saved successfully!', 'status' => 'success', 'code' => '200', 'data' => $user->id]);
        }
        return response()->json(['status' => 'fail', 'code' => '104']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
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
        $records['data'] = $this->userRepo->get($id);
        $records['pageHeading'] = 'User Management: Edit';
        return view('user/edit', $records);
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
        $params = $request->all();

        $validator = Validator::make($params, [
            'name'   => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'user_type_id' => 'required',
        ]);
        if ($validator->fails()) {
             return redirect('/users/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        unset($params['_method']);
        $params['id'] = $id;
        $profile_info = $this->userRepo->editAdd($params);

        request()->session()->flash('message', 'User Updated Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    /**
     * Upload the users in bulk mode.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload() {
        $records['pageHeading'] = 'User Management: Upload';
        return view('user/upload', $records);
    }

}
