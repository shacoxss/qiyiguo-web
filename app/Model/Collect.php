<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $table = 'archive_marked_users';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public function archive()
    {
        return $this->hasOne('App\Models\Archive\Archive','id','archive_id');
    }
}
