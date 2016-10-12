<?php

namespace App\Models\Tag;

use DB;
use Illuminate\Support\Collection;

trait TagAliases
{
    protected $cache;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aliases()
    {
        return $this->primary_tag
            ->belongsToMany(
                static::class,
                TagRelation::RELATION_TABLE,
                TagRelation::RELATION_LEFT,
                TagRelation::RELATION_RIGHT
            )
            ->wherePivot(TagRelation::RELATION, TagRelation::RELATION_ALIAS)
            ->withPivot(TagRelation::RELATION_WEIGHT);
    }

    /**
     * 为一个标签附加别名
     * 当要添加的别名中存在和其他标签的关联关系时，同时把关联关系转移的当前主名标签
     *
     * @param array $aliases
     * @param bool $create_it
     *
     * 出现交叉错误的回调函数，如果为空则抛出异常
     * @param callable $on_error
     * 是否强制执行，如果强制执行将把所要附加的标签的所有关系全部转移的当前主标签上，请谨慎驾驶
     * @param bool $enforce
     * @return static
     * @throws \Exception
     */
    public function attachAliases(
        array $aliases,             callable $on_error = null,
        bool $create_it = false,    $enforce = false
    )
    {
        $tags = self
            ::wrapToTagIdCollect($aliases, $create_it)
            ->diff(
                $this->aliases()
                    ->pluck('tags.id')
                    ->push($this->primary_id)
            )
        ;

        if($tags->isEmpty()) return $this;

        if (!$enforce) {
            $this->checkCross($tags, $on_error);
        }

        //写入数据库
        $this->aliases()->attach(
            $tags->all(),
            [
                TagRelation::RELATION => TagRelation::RELATION_ALIAS,
                TagRelation::RELATION_WEIGHT => 0,
            ]
        );

        TagRelation::relationTransfer($tags, $this->primary_id);

        return $this;
    }

    /**
     * 找出所有已经被设置成别名的标签，防止在添加别名时出现交叉关联
     * 即A是B的别名同时是C的别名的情况
     * @param $tags
     * @param $on_error
     * @return bool
     * @throws \Exception
     */
    private function checkCross($tags, $on_error)
    {
        $cross = TagRelation
            ::alias()
            ->leftIn($tags)
            //->groupBy(TagRelation::RELATION_LEFT)
            ->getId()
        ;
        $cross = TagRelation
            ::alias()
            ->rightIn($tags)
            ->where(TagRelation::RELATION_LEFT, '!=', $this->primary_id)
            ->getId()
            ->merge($cross)
        ;

        if ($cross->isEmpty()) return true;

        if ($on_error) return $on_error($cross);

        throw new \Exception('禁止交叉添加别名');
    }



    /**
     * 把左值修改为$this标签
     * 设置主名不仅仅是更改获取方式，在设置主名的同时还要把所有的关联关系关联到新的主名上
     *
     * @return $this
     */
//    public function setToPrimaryName()
//    {
//        $old_id = $this->getPrimaryName()->id;
//        if($old_id == $this->id) return $this;
//
//        DB::table(TagRelation::RELATION_TABLE)
//            ->where(TagRelation::RELATION_LEFT, $old_id)
//            ->update([TagRelation::RELATION_LEFT => $this->id]);
//
//        DB::table(TagRelation::RELATION_TABLE)
//            ->where(TagRelation::RELATION_RIGHT, $old_id)
//            ->update([TagRelation::RELATION_RIGHT => $this->id]);
//
//        DB::table(TagRelation::RELATION_TABLE)
//            ->where(TagRelation::RELATION_LEFT, DB::raw('`'.self::RELATION_RIGHT.'`'))
//            ->update([TagRelation::RELATION_RIGHT => $old_id]);
//
//        unset($this->cache['primary_key']);
//
//        return $this;
//    }


    /**
     * 获取关系表中的左值对应的标签，该标签即为所有别名的主要命名
     *
     * 在标记关系时使用的是左值(one_id)单向关联右值(other_id)的方法
     * 从而避免交叉关联别名
     *
     */
    public function getPrimaryTagAttribute()
    {
        if (isset($this->cache['primary_name'])) {
            return $this->cache['primary_name'];
        }

        $key_id = TagRelation
            ::alias()
            ->allHas($this->id)
            ->value(TagRelation::RELATION_LEFT);

        return $this->cache['primary_name']
            = ($key_id and $key_id != $this->id)
            ? static::find($key_id)
            : $this;
    }

    public function getPrimaryIdAttribute()
    {
        return $this->getPrimaryTagAttribute()->id;
    }

    /**
     * @param Collection $ids
     * @return Collection
     */
    public static function wrapToPrimaryId($ids)
    {
        $aliases = TagRelation
            ::rightIn($ids)
            ->getId()
        ;
        return $ids
            ->diff($aliases->pluck(TagRelation::RELATION_RIGHT))
            ->merge($aliases->pluck(TagRelation::RELATION_LEFT))
            ->unique()
        ;
    }


}