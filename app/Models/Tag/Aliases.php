<?php

namespace App\Models\Tag;

use DB;
use Illuminate\Support\Collection;

trait Aliases
{
    protected $cache;
    /**
     * 一对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aliases()
    {
        return $this->primary_tag
            ->belongsToMany(
                static::class,
                Relation::TABLE,
                Relation::LEFT,
                Relation::RIGHT
            )
            ->wherePivot(Relation::RELATION, Relation::RELATION_ALIAS)
            ->withPivot(Relation::WEIGHT);
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
     * 是否检查交叉关联，如果不检查将把所要附加的标签的所有关系全部转移的当前主标签上
     * 请谨慎驾驶
     * @param bool $check_cross
     * @return static
     * @throws \Exception
     */
    public function attachAliases(
        array $aliases,             callable $on_error = null,
        bool $create_it = false,    $check_cross = true
    )
    {
        $tags = self
            ::wrapToIds($aliases, $create_it)
            ->diff(
                $this->aliases()
                    ->pluck('tags.id')
                    ->push($this->primary_id)
            )
        ;
        if($tags->isEmpty()) return $this;

        //检查交叉别名
        if ($check_cross && ($cross = $this->hasCross($tags))) {
            if($on_error) return $on_error($cross);

            throw new \Exception('禁止交叉添加别名。');
        }

        //写入数据库
        $this->aliases()->attach(
            $tags->all(),
            [
                Relation::RELATION => Relation::RELATION_ALIAS,
                Relation::WEIGHT => 0,
            ]
        );

        //把被添加的别名以前所拥有的关系转移到现在的主标签上
        Relation::relationTransfer($tags, $this->primary_id);

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
    private function hasCross($tags)
    {
        return (
            $cross = Relation
                ::alias()
                ->leftIn($tags)
                ->orWhere(function ($query) use($tags) {
                    return $query
                        ->rightIn($tags)
                        ->where(Relation::LEFT, '!=', $this->primary_id);
                })
                //->groupBy(Relation::LEFT)
                ->onlyId()
        )
            ->isEmpty()
            ? false
            : $cross
        ;
    }

    /**
     * 获取出去他自己以外的别名标签
     *
     * @return $this
     */
    public function getAliases()
    {
        if ($this->id == $this->primary_id) {
            return $this->aliases()->get();
        } else {
            return $this->aliases()
                ->get()
                ->push($this->primary_tag);
        }
    }



    /**
     * 把左值修改为$this标签
     * 设置主名不仅仅是更改获取方式，在设置主名的同时还要把所有的关联关系关联到新的主名上
     *
     * @return $this
     */
     public function setToPrimaryTag()
     {
         return $this;
     }


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

        $key_id = Relation
            ::alias()
            ->allHas($this->id)
            ->value(Relation::LEFT);

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
     * 把一组标签id集合转换成他们的主id集合
     * @param Collection $ids
     * @return Collection
     */
    public static function convertToPrimarys($ids)
    {
        $aliases = Relation
            ::rightIn($ids)
            ->onlyId()
        ;
        return $ids
            ->diff($aliases->pluck(Relation::RIGHT))
            ->merge($aliases->pluck(Relation::LEFT))
            ->unique()
        ;
    }


}