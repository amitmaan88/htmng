<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\RoomRepo;
use App\Repos\RoomTypeRepo;
use App\Repos\UserRepo;
use App\Repos\HotelRepo;
use Validator;

class RoomController extends Controller {

    public $roomRepo;
    public $roomTypeRepo;
    public $userRepo;
    public $hotelRepo;
    public $siteTitle;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoomRepo $room, RoomTypeRepo $roomType, UserRepo $user, HotelRepo $hotel) {
        $this->roomRepo = $room;
        $this->roomTypeRepo = $roomType;
        $this->userRepo = $user;
        $this->hotelRepo = $hotel;
        $this->siteTitle = SITE_TITLE;
    }

    /**
     * Create a list page.
     *
     * @return void
     */
    public function index(Request $request) {
        $params = $request->all();
        $hotelId = request()->session()->get("hotel", 0);
        $records['data'] = $this->roomRepo->search($params, $hotelId);
        $roomType = $this->roomTypeRepo->activeTypes();
        foreach ($roomType as $rtype) {
            $records['roomTypeList'][$rtype->id] = $rtype->room_type;
        }
        $records['userList'] = $this->userRepo->search(array('status' => 1));
        $records['pageHeading'] = 'Room Management';
        $records['PageTitle'] = $this->siteTitle . ROOM_SUB_TITLE;
        $records['s'] = $params['s'] ?? '';
        return view('room/index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $records['pageHeading'] = 'Room Management: Create';
        $records['PageTitle'] = $this->siteTitle . ROOMC_SUB_TITLE;
        $records['type'] = $this->roomTypeRepo->activeTypes();
        return view('room/create', $records);
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
                    'room_name' => 'required|max:255',
                    'room_type' => 'required',
                    'chair_no' => 'required|numeric|max:50',
                    'table_no' => 'required|numeric|max:50',
                    'bed_no' => 'required|numeric|max:50',
                    'floor_no' => 'required|numeric|max:50',
                    'room_size' => 'required|numeric',
                    'daily_cost' => 'required|numeric',
                    'monthly_cost' => 'required|numeric',
                    'yearly_cost' => 'required|numeric',
                    'description' => 'required|string|max:255'
        ]);
        if ($validator->fails()) {
            return redirect('/room/create')->withErrors($validator)->withInput();
        }

        $params['hotel_id'] = request()->session()->get("hotel", 0);
        $profile_info = $this->roomRepo->editAdd($params);
        $file = $request->file('room_photo');
        if ($file !== "" && $file !== NULL) {
            $path = public_path() . DESTINATION_IMAGE . "\\room";
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            $path .= "\\" . $profile_info->id;
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            if ($file->isValid()) {
                $file->move($path . "\\", $file->getClientOriginalName());
            }
        }
        request()->session()->flash('message', 'Room Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/room');
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
        $records['data'] = $this->roomRepo->get($id);
        $records['pageHeading'] = 'Room Management: Edit';
        $records['PageTitle'] = $this->siteTitle . ROOME_SUB_TITLE;
        $records['type'] = $this->roomTypeRepo->activeTypes();
        return view('room/edit', $records);
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

        $validator = Validator::make($params, [
                    'room_name' => 'required|max:255',
                    'room_type' => 'required',
                    'chair_no' => 'required|numeric|max:50',
                    'table_no' => 'required|numeric|max:50',
                    'bed_no' => 'required|numeric|max:50',
                    'floor_no' => 'required|numeric|max:50',
                    'room_size' => 'required|numeric',
                    'daily_cost' => 'required|numeric',
                    'monthly_cost' => 'required|numeric',
                    'yearly_cost' => 'required|numeric',
                    'description' => 'required|string|max:500'
        ]);
        if ($validator->fails()) {
            return redirect('/room/' . $id . '/edit')->withErrors($validator)->withInput();
        }

        unset($params['_method']);
        $params['id'] = $id;
        $params['hotel_id'] = request()->session()->get("hotel", 0);
        $profile_info = $this->roomRepo->editAdd($params);
        $file = $request->file('room_photo');
        //var_dump($file);die;
        if ($file !== "" && $file !== NULL) {
            $path = public_path() . DESTINATION_IMAGE . "\\room";
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            $path .= "\\" . base64_encode($profile_info->id);
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            if ($file->isValid()) {
                $file->move($path . "\\", $file->getClientOriginalName());
            }
        }
        request()->session()->flash('message', 'Room Updated Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/room');
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
     * Create the type of rooms to offer.
     *     
     * @return \Illuminate\Http\Response
     */
    public function roomtype(Request $request) {

        $roomTypeId = $request->route('room', 0);
        $records['data'] = $this->roomTypeRepo->search();
        $records['data_txt'] = NULL;
        $records['button_txt'] = "Create";
        if ($roomTypeId !== 0 && $roomTypeId !== "" && $roomTypeId !== NULL) {
            $records['data_txt'] = $this->roomTypeRepo->search($roomTypeId, 1)->toArray();
            $records['button_txt'] = "Update";
            //pr($records['data_txt'],1);
        }

        $records['pageHeading'] = 'Room Management: Room Type';
        $records['PageTitle'] = $this->siteTitle . ROOMR_SUB_TITLE;
        return view('room/roomtype', $records);
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
            $stat = $request->tab_stat;
            switch ($stat) {
                case 1: $room = $this->roomRepo->editAdd($params);
                    break;
                case 2: $room = $this->roomTypeRepo->editAdd($params);
                    break;
                default:break;
            }

            return response()->json(['response' => 'Field saved successfully!', 'status' => 'success', 'code' => '200', 'data' => $room->id]);
        }
        return response()->json(['status' => 'fail', 'code' => '104']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rmtype(Request $request) {
        if ($request->ajax()) {
            $room = $this->roomTypeRepo->find($request->id);

            return response()->json(['response' => $room, 'status' => 'success', 'code' => '200', 'data' => $room->id]);
        }
        return response()->json(['status' => 'fail', 'code' => '104']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignusrroom(Request $request) {
        if ($request->ajax()) {
            $room = $this->roomRepo->find($request->room_id);
            //pr($room,1);
            $roomUser = $param = array();
            if ($room->count() > 0) {
                $param['id'] = $request->room_id;                
                $param['user_id'] = $request->user_id;
                $roomUser = $this->roomRepo->editAdd($param);
            }

            return response()->json(['response' => "Tenant assigned to the room", 'status' => 'success', 'code' => '200', 'data' => $room->id]);
        }
        return response()->json(['response' => "Tenant not assigned or already assigned to the room", 'status' => 'fail', 'code' => '104']);
    }

    /**
     * Management of room types
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rtype(Request $request) {
        $params = $request->all();
        //pr($params,1);
        $roomTypeMessage = "";
        if (isset($params['id']) && $params['room_type'] === $params['old_room_type']) {
            $validator = Validator::make($params, [
                        'room_type' => 'required|max:255',
                        'daily_cost' => 'required|numeric',
                        'bed_no' => 'required|numeric',
            ]);
            $roomTypeMessage = 'Room Type Updated Successfully';
        } else {
            $validator = Validator::make($params, [
                        'room_type' => 'required|unique:room_types|max:255',
                        'daily_cost' => 'required|numeric',
                        'bed_no' => 'required|numeric',
            ]);
            $roomTypeMessage = 'Room Type Created Successfully';
        }
        if ($validator->fails()) {
            return redirect('/room/roomtype')->withErrors($validator)->withInput();
        }

        $rtype_info = $this->roomTypeRepo->editAdd($params);
        request()->session()->flash('message', $roomTypeMessage);
        request()->session()->flash('type', 'success');
        return redirect('/room/roomtype');
    }

    public function roomrent(Request $request) {
        $records['pageHeading'] = 'Room Management: Rent';
        $records['PageTitle'] = $this->siteTitle . ROOMRE_SUB_TITLE;        
        $records['userDetail'] = $this->userRepo->find(auth()->user()->id);
        $records['hotelDetail'] = $this->hotelRepo->find(auth()->user()->id);        
        return view('room/roomrent', $records);
    }

    public function rent(Request $request) {
        return redirect('/room/roomrent');
    }

}
