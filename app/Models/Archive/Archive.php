<?php

namespace App\Models\Archive;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed detail_model
 * @property mixed type
 * @property mixed t_edit
 * @property mixed template_edit
 */
class Archive extends Model
{
    //
    const T_ARTICLE = 'archive.article-edit';

    public function detail()
    {
        return $this->hasOne($this->detail_model);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getTemplateEditAttribute()
    {
        if($this->t_edit) return $this->t_edit;

        if ($this->detail_model == 'App\Models\Archive\Article') {
            return self::T_ARTICLE;
        }

        throw new \Exception('template not finn!');
    }

}
