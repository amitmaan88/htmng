<?php

namespace App\Repos;

use App\Food;

class FoodRepo extends Repo {

    public function __construct(Food $model) {
        $this->model = $model;
    }

    public function search() {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

    public function activeItems() {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '=', 1);
        $querySql = $qry->get();
        return $querySql;
    }

}
