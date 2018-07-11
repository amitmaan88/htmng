<?php

namespace App\Http\Controllers;

use App\Notice;
use App\NoticeTemplate;
use Validator;

class NoticeController extends Controller {

    public $notice;

    public function __construct(Notice $notice) {
        $this->notice = $notice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $records['data'] = Notice::all();
        $records['pageHeading'] = 'Notice Management';
        return view('notice/index', $records);
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
        //
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
     * Manage template for the notice
     *
     * @return \Illuminate\Http\Response
     */
    public function template() {
        $records['data'] = NoticeTemplate::all();
        $records['pageHeading'] = 'Notice Template Management';
        return view('notice/template', $records);
    }

}
