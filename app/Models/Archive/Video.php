<?php

namespace App\Models\Archive;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    public $timestamps = false;
    public $primaryKey = 'archive_id';
    public $fillable = ['archive_id', 'content', 'link'];

    public static function saveDetail(Archive $archive, $detail)
    {
        $detail['archive_id'] = $archive->id;
        if ($article = self::find($archive->id)) {
            $article->fill($detail);
            $article->save();
        } else {
            $article = self::create($detail);
        }

        return $article;
    }

    public function archive()
    {
        return $this->hasOne('App\Models\Archive\Archive');
    }
}
