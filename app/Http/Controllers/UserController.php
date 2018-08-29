<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\UserRepo;
use App\Repos\HotelRepo;
use Validator;

class UserController extends Controller {

    public $userRepo;
    public $hotelRepo;
    public $siteTitle;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepo $user, HotelRepo $hotel) {
        $this->userRepo = $user;
        $this->hotelRepo = $hotel;
        $this->siteTitle = SITE_TITLE;
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
        $records['s'] = $params['s'] ?? '';
        $records['pageHeading'] = 'User Management';
        $records['PageTitle'] = $this->siteTitle . USER_SUB_TITLE;

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
        $hotelId = request()->session()->get("hotel", 0);
        $records['hotelData'] = $this->hotelRepo->activeUserHotels(array('hotel_id' => $hotelId));
        $records['PageTitle'] = $this->siteTitle . USERC_SUB_TITLE;
        $records['hotel_id'] = $hotelId;
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
                    'hotel_id' => 'required',
                    'email' => 'required|unique:users|email',
                    'password' => 'required|confirmed|min:6|max:10',
                    'mobile' => 'required|numeric',
                    'landline' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect('/users/create')->withErrors($validator)->withInput();
        }
        $params['password'] = bcrypt($params['password']);
        unset($params['password_confirmation']);
        $profile_info = $this->userRepo->editAdd($params);
        $file = $request->file('up_photo');
        $file_id = $request->file('up_photo_id');
        if ($file !== "" && $file !== NULL && $file_id !== "" && $file_id !== NULL) {
            $path = public_path() . DESTINATION_IMAGE . "\\user";
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            $path .= "\\" . $profile_info->id;
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            if ($file->isValid()) {
                $file->move($path . "\\", "profile_" . $profile_info->id);
            }

            if ($file_id->isValid()) {
                $file_id->move($path . "\\", "id_" . $profile_info->id);
            }
        }

        request()->session()->flash('message', 'User Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cstatus(Request $request) {
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
    public function edit($id) {
        $records['data'] = $this->userRepo->get($id);
        $records['pageHeading'] = 'User Management: Edit';
        $records['PageTitle'] = $this->siteTitle . USERE_SUB_TITLE;
        $hotelId = request()->session()->get("hotel", 0);
        $records['hotelData'] = $this->hotelRepo->activeUserHotels(array('hotel_id' => $hotelId));
        $records['hotel_id'] = $hotelId;
        return view('user/edit', $records);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $params = $request->all();
        $varray = array();
        if ($params['old_email'] === $params['email']) {
            $varray = [
                'name' => 'required',
                'email' => 'required|email',
                'user_type_id' => 'required',
                'hotel_id' => 'required',
                'mobile' => 'required|numeric',
                'landline' => 'numeric',
            ];
        } else {
            $varray = [
                'name' => 'required',
                'user_type_id' => 'required',
                'hotel_id' => 'required',
                'mobile' => 'required|numeric',
                'landline' => 'numeric',
            ];
        }
        if (auth()->user()->user_type_id !== 0) {
            unset($varray['hotel_id']);
        }
        $validator = Validator::make($params, $varray);
        if ($validator->fails()) {
            return redirect('/users/' . $id . '/edit')->withErrors($validator)->withInput();
        }
        unset($params['_method']);
        if (!isset($params['hotel_id']) || $params['hotel_id'] === "" || $params['hotel_id'] === 0) {
            $params['hotel_id'] = request()->session()->get("hotel", 0);
        }
        $params['id'] = $id;
        $profile_info = $this->userRepo->editAdd($params);
        $file = $request->file('up_photo');
        $file_id = $request->file('up_photo_id');
        if ($file !== "" && $file !== NULL && $file_id !== "" && $file_id !== NULL) {
            $path = public_path() . DESTINATION_IMAGE . "\\" . $profile_info->id;
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            if ($file->isValid()) {
                $file->move($path . "\\", $file->getClientOriginalName());
            }

            if ($file_id->isValid()) {
                $file_id->move($path . "\\", $file_id->getClientOriginalName());
            }
        }

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
        $records['PageTitle'] = $this->siteTitle . USERU_SUB_TITLE;
        return view('user/upload', $records);
    }

}
