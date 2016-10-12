<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use DB;

trait TagRelated
{
    /**
     * BelongsToMany关系为单向关联，仅仅是左值关联右值
     *
     * @return BelongsToMany
     */
    private function related_tags()
    {
        return $this
            ->primary_tag
            ->belongsToMany(
                static::class,
                TagRelation::RELATION_TABLE,
                TagRelation::RELATION_LEFT,
                TagRelation::RELATION_RIGHT
            )
            ->wherePivot(TagRelation::RELATION, TagRelation::RELATION_RELATED)
            ->withPivot(TagRelation::RELATION_WEIGHT);
    }

    /**
     * @param array $tags
     * @param bool $create_it
     * @return $this
     */
    public function attachRelatedTags(array $tags, $create_it = false)
    {
        $tags = self::wrapToPrimaryId(
            self::wrapToTagIdCollect($tags, $create_it)
        )
            //防止重复添加
            ->diff($this->getRelatedTags($only_id = true)->push($this->primary_id))
            ->all();

        //写入数据库
        $this->related_tags()->attach(
            $tags,
            [
                TagRelation::RELATION => TagRelation::RELATION_RELATED,
                TagRelation::RELATION_WEIGHT => 1,
            ]
        );

        return $this;
    }

    /**
     * 增量查找出所有关联Tag,$depth为查找深度
     *
     * @param int $depth
     * @param bool $only_id
     * @return Collection
     */
    public function getRelatedTags($depth = 1, $only_id = false)
    {
        //$increment 为增量，$ids 为总量
        $ids = $increment = collect([$this->primary_id]);
        $result = collect();

        for ($i = 0; $i < $depth; $i++) {

            $tmp = TagRelation
                ::related()
                ->allIn($increment)
                ->getId()
            ;

            if($tmp->isEmpty()) break;

            $increment = $tmp
                ->pluck(TagRelation::RELATION_LEFT)
                ->merge(
                    $tmp->pluck(TagRelation::RELATION_RIGHT)
                )
                ->diff($ids)
            ;

            $ids = $ids->merge($increment);

            if (!$only_id) {
                $result = $result->merge(
                    self::whereIn('id', $increment)
                        ->get(['*', DB::raw(($i+1).' as depth')])
                );
            }
        }
        $ids->shift();
        return $only_id ? $ids : $result;
    }

}