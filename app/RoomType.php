<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'room_type', 'bed_no', 'daily_cost', 'status', 'created_at', 'updated_at', 'updated_by', 'created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
