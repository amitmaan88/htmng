<?php

namespace App\Repos;

use App\Menu;

class MenuRepo extends Repo {

    public function __construct(Menu $model) {
        $this->model = $model;
    }

    public function activeMenu($hotel_id = 0) {
        $qryModel = $this->model;
        $qry = $qryModel->selectRaw('GROUP_CONCAT(food_id) as foodIds,food_type,day');
        if ($hotel_id !== 0) {
            $qry = $qry->where('hotel_id', '=', $hotel_id);
        }
        $qry = $qry->groupBy(['day', 'food_type'])->get()->toArray();
        $rec = $querySql = array();
        foreach ($qry as $k => $v) {
            $querySql[$v['day']][$v['food_type']] = $v['foodIds'];
        }

        $rec = $querySql;
        return $rec;
    }

    public function manageMenu($params) {
        $foodMenu = array();
        unset($params['_token']);
        $hotel_id = $params['hotel_id'];
        foreach ($params as $key => $value) {
            //pr($key);
            if (!empty($value)) {
                if ($key === "food_name_breakfast") {
                    foreach ($value as $kd => $vd) {
                        foreach ($vd as $k => $v) {
                            $foodMenu = array('food_id' => $v, 'day' => $kd, 'food_type' => 'break_fast', 'hotel_id' => $hotel_id);
                            $this->updateConditional($foodMenu, $foodMenu);
                        }
                    }
                } else if ($key === "food_name_lunch") {
                    foreach ($value as $kd => $vd) {
                        foreach ($vd as $k => $v) {
                            $foodMenu = array('food_id' => $v, 'day' => $kd, 'food_type' => 'lunch', 'hotel_id' => $hotel_id);
                            $this->updateConditional($foodMenu, $foodMenu);
                        }
                    }
                } else {
                    if ($key === "food_name_dinner") {
                        foreach ($value as $kd => $vd) {
                            foreach ($vd as $k => $v) {
                                $foodMenu = array('food_id' => $v, 'day' => $kd, 'food_type' => 'dinner', 'hotel_id' => $hotel_id);
                                $this->updateConditional($foodMenu, $foodMenu);
                            }
                        }
                    }
                }
            }
        }
        //die("hi");
    }

}
