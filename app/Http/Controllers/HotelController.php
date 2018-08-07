<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\HotelRepo;
use Validator;

class HotelController extends Controller {

    public $hotelRepo;
    public $siteTitle;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HotelRepo $hotel) {
        $this->hotelRepo = $hotel;
        $this->siteTitle = SITE_TITLE;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
                    'hotel_name' => 'required|max:255',
                    'mobile' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }
        
        $info = $this->hotelRepo->editAdd($params);
        $file = $request->file('up_photo');
        if ($file !== "" && $file !== NULL) {
            $path = public_path() . DESTINATION_IMAGE . "\\hotel";
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            $path .= "\\" . base64_encode($info->id);
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            if ($file->isValid()) {
                $file->move($path . "\\", $file->getClientOriginalName());
            }
        }

        request()->session()->flash('message', 'Hotel Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/');
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

}
