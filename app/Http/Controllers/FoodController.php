<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\FoodRepo;
use App\Repos\MenuRepo;
use Validator;

class FoodController extends Controller {

    public $foodRepo;
    public $menuRepo;
    public $siteTitle;

    public function __construct(FoodRepo $food, MenuRepo $menu) {
        $this->foodRepo = $food;
        $this->menuRepo = $menu;
        $this->siteTitle = SITE_TITLE;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        $hotelId = request()->session()->get('hotel', 0);
        $records['data'] = $this->foodRepo->activeItems($hotelId);
        $menuData = $this->menuRepo->activeMenu($hotelId);
        for($i=0;$i<7;$i++){
            if(!array_key_exists($i, $menuData)) {
                $menuData[$i] = NULL;
            }
        }
        ksort($menuData);
        //pr($menuData);
        $records['menu_data'] = $menuData;
        $records['pageHeading'] = 'Food Management: Menu';
        $records['PageTitle'] = $this->siteTitle . FOOD_SUB_TITLE;
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

        $validator = Validator::make($params, [
                 'food_name' => 'required|unique:foods|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/food/item')->withErrors($validator)->withInput();
        }        
        $params['hotel_id'] = request()->session()->get("hotel", 0);
        $info = $this->foodRepo->editAdd($params);
        $fid = $info->id;

        request()->session()->flash('message', 'Food Item Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/food/item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function menu(Request $request) {
        $params = $request->all();
        //print_r($params);die;
        $params['hotel_id'] = request()->session()->get("hotel", 0);
        $info = $this->menuRepo->manageMenu($params);
        request()->session()->flash('message', 'Menu Created Successfully');
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
        $hotelId = request()->session()->get('hotel', 0);
        $records['data'] = $this->foodRepo->search($hotelId);
        $records['pageHeading'] = 'Food Management';
        $records['PageTitle'] = $this->siteTitle . FOODM_SUB_TITLE;
        return view('food/item', $records);
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
            $food = $this->foodRepo->editAdd($params);
            return response()->json(['response' => 'Field saved successfully!', 'status' => 'success', 'code' => '200', 'data' => $food->id]);
        }
        return response()->json(['status' => 'fail', 'code' => '104']);
    }

}
