<?php

namespace App\Observer;

use App\Jobs\TagJob;
use App\Models\Tag\Tag;

class TagObserver
{
    /**
     * @param Tag $tag
     */
    public function created(Tag $tag)
    {
        if(empty($tag->primary_tag->baidu_index)) {
            dispatch(new TagJob($tag->primary_tag));
        }
    }

}