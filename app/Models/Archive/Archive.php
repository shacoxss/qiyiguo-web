<?php

namespace App\Models\Archive;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed detail_model
 * @property mixed type
 * @property mixed t_edit
 * @property mixed template_edit
 * @property mixed detail
 * @property int mode
 */
class Archive extends Model
{
    //
    public $guarded = [];
    public function type()
    {
        return $this->belongsTo('App\Models\Archive\ArchiveType', 'archive_type_id', 'id');
    }

    public function detail()
    {
        return $this->hasOne($this->type->model);
    }

    public function user()
    {
        return $this->belongsTo('App\Model\Users', 'user_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag\Tag');
    }

    public function hasPattern($pattern)
    {
        $mode = DB::table('patterns')->where('name', $pattern)->value('pattern');
        return ($this->mode & $mode) == $mode;
    }

    public function patterns($type)
    {
        return DB::table('patterns')
            ->where('type', $type)
            ->get()
            ->filter(function ($p) {
                return ($p->pattern & $this->mode) == $p->pattern;
            })
        ;
    }

    public function detachPattern($pattern)
    {
        $this->mode &= ~$pattern;
    }

    /**
     * @param $name
     * @return bool
     */
    public function togglePattern($name)
    {
        $pattern = DB::table('patterns')->where('name' ,$name)->value('pattern');

        if($this->hasPattern($name)) {
            $this->detachPattern($pattern);
        } else {
            $this->mode = $this->mode | $pattern;
        }

        return $this->save();
    }
}