<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'template_html', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
