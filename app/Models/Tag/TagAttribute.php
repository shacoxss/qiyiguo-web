<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class TagAttribute extends Model
{
    protected $fillable = ['name', 'icon', 'link', 'sort', 'tag_id'];
    public $timestamps      = false;
}
