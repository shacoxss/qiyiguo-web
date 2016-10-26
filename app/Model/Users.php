<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function followUser()
    {
        return $this->belongsTo('App\Model\FollowUser','followed_id','id');
    }
}
