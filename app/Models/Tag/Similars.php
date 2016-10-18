<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use DB;

trait Similars
{
    /**
     * BelongsToMany关系为单向关联，仅仅是左值关联右值
     * 仅仅能用在调用框架attach方法的时候
     * @return BelongsToMany
     */
    private function similars()
    {
        return $this
            ->primary_tag
            ->belongsToMany(
                static::class,
                Relation::TABLE,
                Relation::LEFT,
                Relation::RIGHT
            )
            ->wherePivot(Relation::RELATION, Relation::RELATION_SIMILAR)
            ->withPivot(Relation::WEIGHT);
    }

    /**
     * @param array $tags
     * @param bool $create_it
     * @return $this
     */
    public function attachSimilars(array $tags, $create_it = false)
    {
        $tags = self
            ::convertToPrimaries(self::wrapToIds($tags, $create_it))
            //防止重复添加
            ->diff($this->getSimilars($only_id = true)->push($this->primary_id))
            ->all();

        //写入数据库
        $this->similars()->attach(
            $tags,
            [
                Relation::RELATION => Relation::RELATION_SIMILAR,
                Relation::WEIGHT => 1,
            ]
        );

        return $this;
    }

    /**
     * 解除关联
     *
     * @param $tags
     * @return int
     */
    public function detachSimilars($tags)
    {
        $ids = self
            ::convertToPrimaries(self::wrapToIds($tags))
        ;
        return Relation
            ::similar()
            ->allHas($this->primary_id)
            ->allIn($ids)
            ->delete()
        ;
    }

    public function updateSimilars($tags, $create_it = false)
    {
        Relation
            ::similar()
            ->allHas($this->primary_id)
            ->delete()
        ;
        return $this->attachSimilars($tags, $create_it);
    }

    /**
     * 增量查找出所有关联Tag,$depth为查找深度
     *
     * @param int $depth
     * @param bool $only_id
     * @return Collection
     */
    public function getSimilars($depth = 1, $only_id = false)
    {
        //$increment 为增量，$ids 为总量
        $ids = $increment = collect([$this->primary_id]);
        $result = collect();

        for ($i = 0; $i < $depth; $i++) {

            $tmp = Relation
                ::similar()
                ->allIn($increment)
                ->onlyId()
            ;
            if($tmp->isEmpty()) break;

            $increment = $tmp
                ->pluck(Relation::LEFT)
                ->merge(
                    $tmp->pluck(Relation::RIGHT)
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