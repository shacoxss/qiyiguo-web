<?php
/**
 * Created by PhpStorm.
 * User: shx
 * Date: 2016/10/24
 * Time: 14:46
 */

namespace App\Models\Archive;

use App\Model\Users;

trait Marks
{
    public function likedUsers()
    {
        return $this->belongsToMany('App\Model\Users', 'archive_marked_users', 'archive_id', 'user_id')
            ->withTimestamps()
            ->where('type', 'like')
        ;
    }

    public function like($user)
    {
        $liked = $this->likedUsers()->where('user_id', $user->id)->first();

        if (!$liked) {
            $this->likedUsers()->attach($user->id);
        }
    }

    public function isLiked($user)
    {
        return !$user
            || !$this->likedUsers()->where('user_id', $user->id)->first()
            ? false
            : true;
    }

    public function getLikedCountAttribute()
    {
        return $this->likedUsers()->count();
    }
}