<?php

namespace App\Models\Archive;

use Illuminate\Database\Eloquent\Model;

class ArchiveVisit extends Model
{
    //
    const VISITED_EXPIRE = 86400;
    protected $guarded = [];
}
