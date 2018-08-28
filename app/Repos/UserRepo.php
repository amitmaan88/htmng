<?php

namespace App\Repos;

use App\User;

class UserRepo extends Repo {

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function search($params) {
        $userType = array_flip(staticDropdown("userType"));

        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        if (auth()->user()->user_type_id !== 0) {
            $qry->where('hotel_id', 'like', auth()->user()->hotel_id);
        }
        if (!empty($params['s'])) {
            $s = strtolower($params['s']);
            $qry = $qry->where(
                    function ($qry) use ($s, $userType) {
                $qry->where('name', 'like', '%' . $s . '%')
                        ->orWhere('mobile', 'like', '%' . $s . '%');
                if (!empty($userType[$s])) {
                    $qry->orWhere('user_type_id', 'like', '%' . $userType[$s] . '%');
                }
                $qry->orWhere('email', 'like', '%' . $s . '%');
            }
            );
        }

        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

}
