<?php

namespace App\Http\Controllers;

use App\Repos\HotelRepo;
use App\Repos\RoomRepo;
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
        $records['data'] = $this->hotelRepo->search($params)->toArray();
        $records['hotel_name'] = 0;
        if (auth()->user()->user_type_id === 1 || auth()->user()->user_type_id === 2) {
            request()->session()->put("hotel", auth()->user()->hotel_id);
        } else {
            if (!empty($params)) {
                $records['hotel_name'] = $params['hotel_name'];
                request()->session()->put("hotel", $params['hotel_name']);
            }
        }
        $params['hotel_name'] = $records['hotel_name'] = request()->session()->get("hotel", "");
        $records['data'] = $this->hotelRepo->search($params)->toArray();
        $records['PageTitle'] = $this->siteTitle . HOME_SUB_TITLE;
        $records['roomData'] = $this->roomRepo->activeRooms()->toArray();

        return view('home', $records);
    }

}
