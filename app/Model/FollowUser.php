<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    protected $table = 'user_follow';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->hasOne('App\Model\Users','id','followed_id');
    }
}
