<?php

namespace App\Models\Archive;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Article extends Model
{
    //
    public $timestamps = false;
    public $primaryKey = 'archive_id';
    public $guarded = [];

    public function archive()
    {
        return $this->hasOne('App\Models\Archive\Archive');
    }
}
