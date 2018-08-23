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
        if ($userTypeId === 0) {
        $qry = $this->model->where(
                function ($qry) use ($hotelId) {
            $qry->leftJoin('users', 'complaints.hotel_id', '=', 'users.hotel_id')
                    ->where('complaints.hotel_id', '=', $hotelId);
        }
        );
        } else {
            $qry = $this->model->where(
                    function ($qry) use ($userId) {
                $qry->leftJoin('users', 'complaints.user_id', '=', 'users.id')
                        ->where('complaints.user_id', '=', $userId);
            }
            );
        }
        $querySql = $qry->paginate(LIMIT);
        return $querySql;
    }

}
