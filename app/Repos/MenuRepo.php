<?php

namespace App\Repos;

use App\Menu;

class MenuRepo extends Repo {

    public function __construct(Menu $model) {
        $this->model = $model;
    }

    public function activeMenu() {        
        $qryModel = $this->model->selectRaw('GROUP_CONCAT(food_id) as foodIds,food_type,day');
        $qry = $qryModel->groupBy(['day','food_type'])->get()->toArray();
        $rec = $querySql = array();
        foreach($qry as $k=>$v) {
            $querySql[$v['day']][$v['food_type']] = $v['foodIds'];
        }
        $rec = array_replace(staticDropdown("foodDay"), $querySql);        
        return $rec;
    }

    public function manageMenu($params) {
        $foodMenu = array();
        unset($params['_token']);
        foreach ($params as $key => $value) {
            if (!empty($value)) {
                if ($key === "food_name_breakfast") {
                    foreach ($value as $kd => $vd) {
                        foreach ($vd as $k => $v) {
                            $foodMenu = array('food_id' => $v, 'day' => $kd, 'food_type' => 'break_fast');
                            $this->updateConditional($foodMenu, $foodMenu);
                        }
                    }
                } else if ($key === "food_name_lunch") {
                    foreach ($value as $kd => $vd) {
                        foreach ($vd as $k => $v) {
                            $foodMenu = array('food_id' => $v, 'day' => $kd, 'food_type' => 'lunch');
                            $this->updateConditional($foodMenu, $foodMenu);
                        }
                    }
                } else {
                    foreach ($value as $kd => $vd) {
                        foreach ($vd as $k => $v) {
                            $foodMenu = array('food_id' => $v, 'day' => $kd, 'food_type' => 'dinner');
                            $this->updateConditional($foodMenu, $foodMenu);
                        }
                    }
                }
            }
        }
    }

}
