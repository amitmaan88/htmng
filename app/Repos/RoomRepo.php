<?php

namespace App\Repos;

use App\Room;

class RoomRepo extends Repo {

    public function __construct(Room $model) {
        $this->model = $model;
    }

    public function search($params) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        if (!empty($params['s'])) {
            $s = strtolower($params['s']);
            $qry = $qry->where(
                    function ($qry) use ($s) {
                $qry->where('room_name', 'like', '%' . $s . '%');
            }
            );
        }

        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

}
