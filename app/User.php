<?php

namespace App;

use App\Traits\Status;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Status;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'user_type_id', 'hotel_id', 'status', 'created_by', 'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel')->first();
    }
}
