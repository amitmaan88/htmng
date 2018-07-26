<?php

namespace App\Repos;

use App\RoomType;

class RoomTypeRepo extends Repo {

    public function __construct(RoomType $model) {
        $this->model = $model;
    }

    public function search($param = "") {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        if ($param !== "") {
            $qry->where('id', '=', $param);
        }
        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

    public function activeTypes() {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '=', 1);        
        $querySql = $qry->get();
        return $querySql;
    }

}
