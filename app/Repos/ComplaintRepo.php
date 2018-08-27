<?php

namespace App\Repos;

use App\Complaint;

class ComplaintRepo extends Repo {

    public function __construct(Complaint $model) {
        $this->model = $model;
    }

    public function complaintList($hotelId = 0) {
        $userId = auth()->user()->id;
        $userTypeId = auth()->user()->user_type_id;
        $qry = $this->model;

        //echo $hotelId;
        $qry = $qry->leftJoin('users', 'complaints.user_id', '=', 'users.id')
                ->select('complaints.*', 'users.name')
                ->where(function ($qry) use ($hotelId, $userTypeId, $userId) {
            if ($userTypeId === 1 || $userTypeId === 0) {
                $qry->where('complaints.hotel_id', '=', $hotelId);
            } else if ($userTypeId === 2) {
                $qry->where('complaints.user_id', '=', $userId);
            }
        }
        );

        $querySql = $qry->paginate(LIMIT);
        //$this->printDBQuery($qry);
        return $querySql;
    }

}
