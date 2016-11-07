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
        return $this->belongsTo('App\Model\FollowUser','id','followed_id');
    }

    public function isFollowed($follower)
    {
        $user = session('user');

        return $user && FollowUser::where('user_id', $user->id)
            ->where('followed_id', $follower->id)->first();
    }

    public function archives()
    {
        return $this->belongsTo('App\Models\Archive\Archive', 'id', 'user_id');
    }
}
