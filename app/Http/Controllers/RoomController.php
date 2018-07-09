<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Validator;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Create a list page.
     *
     * @return void
     */
    public function index()
    {
        $records['data'] = Room::all();
        $records['pageHeading'] = 'Room Management';
        return view('room/index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $records['data'] = Room::get();
        $records['pageHeading'] = 'Room Management: Create';
        return view('room/create', $records);
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
            return redirect('/room');
        }

        $validator = Validator::make($params, [
            'room_name'   => 'required',
            'room_no' => 'required|numeric',
            'floor_no' => 'required|numeric',            
            'room_type' => 'required|string',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/room/create')->withErrors($validator)->withInput();
        }
        $profile_info = User::create($params);
        $profile_id = $profile_info->id;

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
