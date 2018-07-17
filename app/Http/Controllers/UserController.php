<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller {

    public $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user) {
        $this->user = $user;
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
        $records['data'] = $this->user->search($params);
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
        $records['data'] = $this->user->get();
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

        $profile = new User;
        $profile->name = $params['name'] . " " . $params['last_name'];
        $profile->user_type_id = $params['user_type_id'];
        $profile->email = $params['email'];
        $profile->password = bcrypt($params['password']);
        $profile->mobile = $params['mobile'];
        $profile->landline = $params['landline'];
        $profile->status = 1;
        $status = $profile->saveOrFail();
        //$profile_id = $profile->id;

        request()->session()->flash('message', 'User Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeSatus(Request $request) {
        if ($request->ajax()) {
            $user = $this->user->find($request->id);
            $user->changeField($request->all());
            return response()->json(['response' => 'Field saved successfully!', 'status' => 'success', 'code' => '200', 'data' => $saved->id]);
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
        $records['data'] = $this->user->find($id);
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
        unset($params['_token']);unset($params['_method']);
        $profile_info = $this->user->where('id', $id)->update($params);

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
