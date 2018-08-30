<?php

namespace App\Repos;

use App\NoticeServe;

class NoticeServeRepo extends Repo {

    public function __construct(NoticeServe $model) {
        $this->model = $model;
    }

    public function userNoticeServed() {
        $qryModel = $this->model;
        $qry = $qryModel->rightJoin('notices', 'notice_serves.notice_id', '=', 'notices.id')
                ->where('notice_serves.user_id', '=', auth()->user()->id)
                ->where(\Illuminate\Support\Facades\DB::raw('DATE_ADD(notice_serves.notice_date, INTERVAL ' . NOTICE_DAYS . ' DAY)'), '>=', \Illuminate\Support\Facades\DB::raw('CURDATE()'));
        $querySql = $qry->get()->toArray();
        //$this->printDBQuery($qry);
        //print_r($querySql);
        return $querySql;
    }

}
