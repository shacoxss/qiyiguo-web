<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];

    public static function sort($arr,$parent_id = 0,$lev=0)
    {
        static $list = array();
        foreach($arr as $v) {
            if($v['cate_pid'] == $parent_id) {
                $v['lev'] = $lev;
                $list[] = $v;
                self::sort($arr,$v['cate_id'],$lev+1);
            }
        }
        return $list;

    }

    public static function get_pid($cate_id)
    {
        static $pid = array();
        $self = self::where('cate_id',$cate_id)->first();
        if($self->cate_pid!=0){
            $pid[] = $self->cate_pid;
            self::get_pid($self->cate_pid);
        }

        return implode(',',$pid);

    }
/*    public function archives()
    {
        return $this->belongsTo('App\Model\Archives','type_id','cate_id');
    }*/
}
