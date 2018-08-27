<?php

namespace App\Repos;

use App\Food;

class FoodRepo extends Repo {

    public function __construct(Food $model) {
        $this->model = $model;
    }

    public function search($hotel_id = 0) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        if ($hotel_id !== 0) {
            $qry = $qry->where('hotel_id', '=', $hotel_id);
        }
        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

    public function activeItems($hotel_id = 0) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '=', 1);
        if ($hotel_id !== 0) {
            $qry = $qry->where('hotel_id', '=', $hotel_id);
        }
        $querySql = $qry->get();
        return $querySql;
    }

}
