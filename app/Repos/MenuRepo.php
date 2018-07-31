<?php

namespace App\Repos;

use App\Menu;

class MenuRepo extends Repo {

    public function __construct(Menu $model) {
        $this->model = $model;
    }

    public function manageMenu($params) {
        $foodMenu = array();
        $foodDay = staticDropdown("foodDay");
        unset($params['_token']);
        //echo "<pre>";print_r($params);
        foreach ($params as $key => $value) {
            if (!empty($value)) {
                if ($key === "food_name_breakfast") {
                    //print_r($value);
                    foreach ($value as $kd => $vd) {
                        //print_r($vd);
                        foreach ($vd as $k => $v) {
                            //print_r($v);
                            $foodMenu[] = array('food_id' => $v, 'day' => $foodDay[$kd], 'food_type' => 'break_fast');
                        }
                    }
                } else if ($key === "food_name_lunch") {                    
                    foreach ($value as $kd => $vd) {
                        foreach ($vd as $k => $v) {
                            $foodMenu[] = array('food_id' => $v, 'day' => $foodDay[$kd], 'food_type' => 'lunch');
                        }
                    }
                } else {
                    foreach ($value as $kd => $vd) {
                        foreach ($vd as $k => $v) {
                            $foodMenu[] = array('food_id' => $v, 'day' => $foodDay[$kd], 'food_type' => 'dinner');
                        }
                    }
                }
            }
        }
        //echo "<pre>";
        //print_r($foodMenu);die;
        $this->editAdd($foodMenu);
    }

}
