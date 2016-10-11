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
    private function relatedTags()
    {
        return $this
            ->getPrimaryName()
            ->belongsToMany(
                static::class,
                self::RELATION_TABLE,
                self::RELATION_KEY_COLUMN,
                self::RELATION_OTHER_COLUMN
            )
            ->wherePivot(self::RELATION_NAME_COLUMN, self::RELATION_RELATED)
            ->withPivot(self::RELATION_WEIGHT_COLUMN);
    }

    /**
     * @param array $tags
     * @param bool $create_it
     * @return $this
     */
    public function attachRelatedTags(array $tags, $create_it = false)
    {
        $tags = self::wrapToTagIdCollect($tags, $create_it)
//            ->map(function ($tag) {
//                return $tag->getPrimaryName();
//            })
            //防止重复添加
            ->diff($this->getRelatedTags($only_id = true)->push($this->id))
            ->all();

        //写入数据库
        $this->relatedTags()->attach(
            $tags,
            [
                self::RELATION_NAME_COLUMN => self::RELATION_RELATED,
                self::RELATION_WEIGHT_COLUMN => 1,
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
        $ids = $increment = collect([$this->getPrimaryName()->id]);
        $result = collect();

        for ($i = 0; $i < $depth; $i++) {
            $tmp = DB::table(self::RELATION_TABLE)

                ->where(self::RELATION_NAME_COLUMN, self::RELATION_RELATED)

                ->where(function ($query) use($increment) {
                    $query->whereIn(self::RELATION_KEY_COLUMN, $increment)
                        ->orWhereIn(self::RELATION_OTHER_COLUMN, $increment);
                })

                ->get([
                    self::RELATION_KEY_COLUMN,
                    self::RELATION_OTHER_COLUMN
                ]);

            if($tmp->isEmpty()) break;

            $ids = $ids->merge(
                $increment = $tmp
                    ->pluck(self::RELATION_KEY_COLUMN)
                    ->merge(
                        $tmp->pluck(self::RELATION_OTHER_COLUMN)
                    )->diff($ids)
            );

            if (!$only_id) {
                $result = $result->merge(
                    self::whereIn('id', $increment)
                        ->get(['*', DB::raw(($i+1).' as depth')])
                );
            }
        }

        return $only_id ? $ids : $result;
    }

}