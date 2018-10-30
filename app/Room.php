<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'room_name', 'room_type', 'chair_no', 'table_no', 'bed_no', 'floor_no', 'room_size', 'daily_cost', 'monthly_cost', 'yearly_cost', 'description', 'hotel_id', 'user_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel')->first();
    }
}
