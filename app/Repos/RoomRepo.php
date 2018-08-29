<?php

namespace App\Repos;

use App\Room;

class RoomRepo extends Repo {

    public function __construct(Room $model) {
        $this->model = $model;
    }

    public function search($params = "", $hotelId = 0) {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '!=', 2);
        if($hotelId !== 0) {
            $qry->where('hotel_id', '=', $hotelId);
        }
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

    public function activeRooms($params = "") {
        $qryModel = $this->model;
        $qry = $qryModel->where('status', '=', 1);
        if (!empty($params['s'])) {
            $s = strtolower($params['s']);
            $qry = $qry->where(
                    function ($qry) use ($s) {
                $qry->where('room_type', '=', $s);
            }
            );
        }

        $querySql = $qry->get();
        return $querySql;
    }

}
