<?php

namespace App\Repos;

use App\Hotel;

class HotelRepo extends Repo {

    public function __construct(Hotel $model) {
        $this->model = $model;
    }

    public function activeHotels($param="") {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);        
        $querySql = $qry->get();
        //print_r($querySql);
        return $querySql;
    }

    public function search($param) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        if (isset($param['hotel_name']) === true && $param['hotel_name'] !== "") {
            $qry->where('id', '=', $param['hotel_name']);
        }
        $querySql = $qry->get();
        //pr($querySql);
        return $querySql;
    }

}
