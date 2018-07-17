<?php

namespace App;

use App\Traits\Status;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Status;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile', 'email', 'password', 'user_type_id', 'hotel_id', 'status', 'created_by', 'updated_by', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hotel() {
        return $this->belongsTo('App\Hotel')->first();
    }

    public function search($params) {
        $userType = array_flip(staticDropdown("userType"));
        $paginateCount = 1;
        $qry = $this->query();
        if (!empty($params['s'])) {
            $query = $params['s'];
            $qry->where(
                    function ($q) use ($query, $userType) {
                $q->where('name', 'like', '%' . $query . '%')
                        ->orWhere('mobile', 'like', '%' . $query . '%');
                if (isset($userType[$query])) {
                    $q->orWhere('user_type_id', 'like', '%' . $userType[$query] . '%');
                }
                $q->orWhere('hotel_id', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%');
            }
            );
        }
        $querySql = $qry->orderBy('id', 'DESC')
                ->paginate($paginateCount);

        return $querySql;
    }

}
