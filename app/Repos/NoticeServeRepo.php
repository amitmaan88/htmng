<?php

namespace App\Repos;

use App\NoticeServe;

class NoticeServeRepo extends Repo {

    public function __construct(NoticeServe $model) {
        $this->model = $model;
    }

    public function userNoticeServed() {
        $qryModel = $this->model;
        $qry = $qryModel->where('user_id', '=', auth()->user()->id);        
        $querySql = $qry->get()->toArray();
        //print_r($querySql);
        return $querySql;
    }
}
