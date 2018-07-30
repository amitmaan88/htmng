<?php

namespace App\Repos;

use App\Notice;

class NoticeRepo extends Repo {

    public function __construct(Notice $model) {
        $this->model = $model;
    }

    public function activeNotices($param) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '=', 1)->where('current_template', '=', 1);
        if (isset($param['title_id']) === true && $param['title_id'] !== "") {
            $qry->where('id', '=', $param['title_id']);
        }
        $querySql = $qry->get();
        //print_r($querySql);
        return $querySql;
    }

    public function search($param) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        if (isset($param['title_id']) === true && $param['title_id'] !== "") {
            $qry->where('id', '=', $param['title_id']);
        }
        $querySql = $qry->get();
        return $querySql;
    }

    public function updateTemplate($id) {
        $this->model::where('id', '!=', $id)->where('current_template', '=', 1)
                ->update([
                    'current_template' => 0
        ]);
        $this->model::where('id', '=', $id)
                ->update([
                    'current_template' => 1
        ]);
    }
}
