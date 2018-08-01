<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\ComplaintRepo;
use Validator;

class ComplaintController extends Controller {

    public $complaintRepo;

    public function __construct(ComplaintRepo $complaint) {
        $this->complaintRepo = $complaint;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $records['data'] = $this->complaintRepo->all();
        $records['pageHeading'] = 'Complaint Management';
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
        $info = $this->complaintRepo->editAdd($params);
        
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

}
