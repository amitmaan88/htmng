<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repos\HotelRepo;
use App\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public $siteTitle;
    public $hotelRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->siteTitle = SITE_TITLE;
        $this->hotelRepo = new HotelRepo(new Hotel());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $params = $request->all();        
        $records['hotelList'] = $this->hotelRepo->activeHotels();
        $records['hotel_name'] = ($params['hotel_name']) ?? "";
        $records['data'] = $this->hotelRepo->search($params)->toArray();
        //pr($records['data']);
        $records['PageTitle'] = $this->siteTitle . HOME_SUB_TITLE;
        return view('home', $records);
    }

}
