<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Validator;

class FoodController extends Controller {

    public $food;

    public function __construct(Food $food) {
        $this->food = $food;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $records['data'] = Food::all();
        $records['pageHeading'] = 'Food Management';
        return view('food/index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $params = $request->all();
        if (isset($request->cancel) && $request->cancel == 1) {
            return redirect('/food');
        }

        $validator = Validator::make($params, [
                    'room_name' => 'required',
                    'room_no' => 'required|numeric',
                    'floor_no' => 'required|numeric',
                    'room_type' => 'required|string',
                    'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/food/item')->withErrors($validator)->withInput();
        }
        $profile_info = User::create($params);
        $profile_id = $profile_info->id;

        request()->session()->flash('message', 'Room Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/food');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
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
     * Food items for the food menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item() {
        $records['data'] = Food::get();
        $records['pageHeading'] = 'Food Management: Food Menu';
        return view('food/item', $records);
    }

}
