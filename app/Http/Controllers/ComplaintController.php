<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\ComplaintRepo;
use Validator;

class ComplaintController extends Controller {

    public $complaintRepo;
    public $siteTitle;

    public function __construct(ComplaintRepo $complaint) {
        $this->complaintRepo = $complaint;
        $this->siteTitle = SITE_TITLE;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $complaintId = $request->route('c', 0);
        $hotelId = 0;
        if (auth()->user()->user_type_id === 0) {
            $hotelId = request()->session()->get("hotel", 0);
        } else {
            $hotelId = auth()->user()->hotel_id;
        }        
        $records['data'] = $this->complaintRepo->complaintList($hotelId);
        $records['compSingledata'] = $this->complaintRepo->get($complaintId);
        $records['complaintType'] = staticDropdown("complaints", "Select");                                    
        //pr($records['data']);
        $records['pageHeading'] = 'Complaint Management';
        $records['PageTitle'] = $this->siteTitle . COMPLAINT_SUB_TITLE;
        return view('complaint/index', $records);
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
                    'complaint_title' => 'required|min:3|max:255',
                    'complaint_type' => 'required',
                    'complaint_desc' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/complaint')->withErrors($validator)->withInput();
        }
        $params['hotel_id'] = request()->session()->get("hotel", 0);
        $info = $this->complaintRepo->editAdd($params);
        $file = $request->file('complaint_pic');
        if ($file !== "" && $file !== NULL) {
            $path = public_path() . DESTINATION_IMAGE . "\\complaint\\";
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            $path .= base64_encode($info->id);
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                \Illuminate\Support\Facades\File::makeDirectory($path);
            }
            if ($file->isValid()) {
                $file->move($path . "\\", $file->getClientOriginalName());
            }
        }

        request()->session()->flash('message', 'Complaint Registered');
        request()->session()->flash('type', 'success');
        return redirect('/complaint');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cstatus(Request $request) {
        if ($request->ajax()) {
            $params['id'] = $request->id;
            $params['status'] = $request->status;
            $comp = $this->complaintRepo->editAdd($params);
            return response()->json(['response' => 'Field saved successfully!', 'status' => 'success', 'code' => '200', 'data' => $comp->id]);
        }
        return response()->json(['status' => 'fail', 'code' => '104']);
    }

}
