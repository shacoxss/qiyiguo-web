<?php

namespace App\Models\Archive;

use App\Helpers\UploadFile;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int archive_id
 */
class Gallery extends Model
{
    //
    public $timestamps = false;
    public $primaryKey = 'archive_id';
    public $fillable = ['archive_id', 'content'];

    public static function saveDetail(Archive $archive, $detail)
    {
        $detail['archive_id'] = $archive->id;
        if ($gallery = self::find($archive->id)) {
            $gallery->fill($detail);
            $gallery->save();
        } else {
            $gallery = self::create($detail);
        }

        $gallery->images()->delete();

        foreach ($detail['images'] as $index => $image) {
            $image = (array)json_decode($image);
            $image['archive_id'] = $archive->id;
            $image['url'] = is_integer($image['url']) ? UploadFile::save($detail['files'][$image['url']]) : $image['url'];
            $image['index'] = $index;
            $images[] = GalleryImage::create($image);
        }

        if (empty($archive->cover)) {
            $archive->cover = $images[0]['url'];
            $archive->save();
        }

        return $gallery;
    }

    public function images()
    {
        return $this->hasMany('App\Models\Archive\GalleryImage', 'archive_id', 'archive_id');
    }
}
