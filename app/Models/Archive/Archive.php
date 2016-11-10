<?php

namespace App\Models\Archive;

use App\Model\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int id
 * @property mixed detail_model
 * @property mixed type
 * @property mixed t_edit
 * @property mixed template_edit
 * @property mixed detail
 * @property int mode
 */
class Archive extends Model
{
    use VisitCountable, Marks;

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

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id', 'cate_id');
    }
    public function tags()
    {
        return $this
            ->belongsToMany('App\Models\Tag\Tag')
        ;
    }

    public function hasPattern($pattern)
    {
        $mode = \DB::table('patterns')->where('name', $pattern)->value('pattern');
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
    {   //未通过审核
        $this->mode &= ~$pattern;
    }

    /**
     * @param $name
     * @return bool
     */
    public function togglePattern($name)
    {
        $pattern = \DB::table('patterns')->where('name' ,$name)->value('pattern');

        if($this->hasPattern($name)) {
            $this->detachPattern($pattern);
        } else {
            $this->mode = $this->mode | $pattern;
        }

        return $this->save();
    }

    //通过审核
    public function passReview()
    {
        $this->mode = $this->mode | 8;
        $data['is_pass'] = 1;
        $data['archive_id'] = $this->id;
        $data['user_id'] = $this->user_id;
        $data['message_no'] = 1;
        $data['message_info'] = '恭喜！您发布的《'.$this->title.'》已经通过审核!';
        $data['message'] = "奇异果聚合旨在提供原创的直播相关内容，感谢您的贡献！<br>奖励：积分+200 ";
        $data['reviewed_id'] = session('user')->id;
        \DB::table('users')->where('id',$this->user_id)->increment('points',200);
        Message::where('archive_id',$this->id)->delete();
        Message::create($data);
        return $this->save();
    }
    //未通过审核
    public function noPassReview()
    {
        $this->mode &= ~8;
        return $this->save();
    }


    public function generateTagUrl()
    {
        $model = $this->detail()->first();
        $content = $model->content;
        foreach ($this->tags()->get() as $tag) {
            $name = trim($tag->name);
            $content =  preg_replace('/'.$name.'/', "<a class='tag' href='$tag->url'>$tag->name</a>", $content, 1);
        }
        $model->content = $content;
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    public function scopeOfPattern($query, $pattern)
    {
        $pattern = \DB::table('patterns')->where('name' ,$pattern)->value('pattern');
        return $query->whereRaw("(`mode` & $pattern) = $pattern");
    }

    public function collect()
    {
        return $this->belongsTo('App\Model\Collect','archive_id','id');
    }

    public function checkReview()
    {
        if($message = Message::where('archive_id',$this->id)->first()){
            return $message->is_pass;
        }else{
            return -1;
        }
    }
}
