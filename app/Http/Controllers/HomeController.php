<?php

namespace App\Http\Controllers;

use App\Repos\HotelRepo;
//use App\Hotel;
use App\Repos\RoomRepo;
//use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public $siteTitle;
    public $hotelRepo;
    public $roomRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoomRepo $roomRepo, HotelRepo $hotelRepo) {
        $this->middleware('auth');
        $this->siteTitle = SITE_TITLE;
        $this->hotelRepo = $hotelRepo;
        $this->roomRepo = $roomRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $params = $request->all();
        $records['hotelList'] = $this->hotelRepo->activeHotels();
        $params['hotel_name'] = $records['hotel_name'] = request()->session()->get("hotel", 0);
        if (isset($params['hotel_name'])) {
            //$records['hotel_name'] = $params['hotel_name'];
            request()->session()->set("hotel", $params['hotel_name']);
        }
        $records['data'] = $this->hotelRepo->search($params)->toArray();

        //pr($records,1);
        $records['PageTitle'] = $this->siteTitle . HOME_SUB_TITLE;
        $records['roomData'] = $this->roomRepo->activeRooms();
        return view('home', $records);
    }

}
