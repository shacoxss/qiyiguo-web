<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
