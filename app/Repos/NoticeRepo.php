<?php

namespace App\Repos;

use App\Notice;

class NoticeRepo extends Repo {

    public function __construct(Notice $model) {
        $this->model = $model;
    }

    public function activeNotices() {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '=', 1);
        $querySql = $qry->get();
        return $querySql;
    }

    public function search($param) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);        
        if (isset($params['title_id']) === true && $params['title_id'] !== "") {
            $qry->where('id', '=', $param['title_id']);
        }
        $querySql = $qry->get();
        return $querySql;
    }

}
