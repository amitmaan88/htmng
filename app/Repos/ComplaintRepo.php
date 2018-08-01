<?php

namespace App\Repos;

use App\Complaint;

class ComplaintRepo extends Repo {

    public function __construct(Complaint $model) {
        $this->model = $model;
    }
}
