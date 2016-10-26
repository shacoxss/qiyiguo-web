<?php

namespace App\Observers;

use App\Models\Tag\Tag;

class TagObserver
{
    /**
     * @param Tag $tag
     */
//    public function created(Tag $tag)
//    {
//        if(empty($tag->primary_tag->baidu_index)) {
//            dispatch(new TagJob($tag->primary_tag));
//        }
//    }

    public function creating($tag)
    {
        $tag->name = trim($tag->name);

        if ($msg = $tag->isInvalidName()) {
            throw new \InvalidArgumentException($msg);
        }

        $tag->autoComputePinyin();
    }

}