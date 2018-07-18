<?php

namespace App\Repos;

use App\User;

class UserRepo extends Repo {

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function search($params) {
        $userType = array_flip(staticDropdown("userType"));

        $qry = $this->model;
        $qry = $qry->where('status','!=',2);
        if (!empty($params['s'])) {
            $s = $params['s'];
            $qry = $qry->where(
                    function ($qry) use ($s, $userType) {
                $qry->where('name', 'like', '%' . $s . '%')
                        ->orWhere('mobile', 'like', '%' . $s . '%');
                if (!empty($userType[$s])) {
                    $qry->orWhere('user_type_id', 'like', '%' . $userType[$s] . '%');
                }

                $qry->orWhere('hotel_id', 'like', '%' . $s . '%')
                        ->orWhere('email', 'like', '%' . $s . '%');
            }
            );
        }

        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

}
