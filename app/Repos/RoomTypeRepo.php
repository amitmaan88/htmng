<?php

namespace App\Repos;

use App\RoomType;

class RoomTypeRepo extends Repo {

    public function __construct(RoomType $model) {
        $this->model = $model;
    }

    public function search() {
        $qry = $this->model;
        $qry = $qry->where('status','!=',2);
        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

}

