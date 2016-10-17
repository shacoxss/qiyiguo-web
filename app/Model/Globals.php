<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Globals extends Model
{
    protected $table = 'global';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
