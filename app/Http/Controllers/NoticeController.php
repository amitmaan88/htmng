<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repos\NoticeRepo;
use Validator;

class NoticeController extends Controller {

    public $noticeRepo;

    public function __construct(NoticeRepo $notice) {
        $this->noticeRepo = $notice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $params = $request->all();
        $records['alldata'] = $this->noticeRepo->all();
        $records['id'] = isset($params['title_id']) ? $params['title_id'] : "";
        if (!empty($records['id'])) {
            $this->noticeRepo->updateTemplate($records['id']);
        }
        $records['data'] = $this->noticeRepo->activeNotices($params);
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
        $params = $request->all();
        if (isset($params['title_id']) === true && $params['title_id'] !== "") {
            $params['id'] = $params['title_id'];
        }
        $notice = $this->noticeRepo->editAdd($params);
        $this->noticeRepo->updateTemplate($notice->id);
        request()->session()->flash('message', 'Notice Created Successfully');
        request()->session()->flash('type', 'success');
        return redirect('/notice/template');
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
    public function template(Request $request) {
        $params = $request->all();
        $records['data'] = $this->noticeRepo->search($params);
        $records['alldata'] = $this->noticeRepo->all();
        if (isset($params['title_id']) === true && $params['title_id'] !== "") {
            $records['id'] = $params['title_id'];
            $records['btnText'] = 'Update';
        } else {
            $records['id'] = "";
            $records['btnText'] = 'Create';
        }
        $records['pageHeading'] = 'Notice Management';

        //print_r($records['data']);
        return view('notice/template', $records);
    }

}
