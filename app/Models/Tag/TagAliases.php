<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait TagAliases
{
    /**
     * @return BelongsToMany
     */
    public function aliases()
    {
        return $this->getRelationKey()
            ->belongsToMany(
                static::class,
                self::RELATION_TABLE,
                self::RELATION_KEY_COLUMN,
                self::RELATION_OTHER_COLUMN
            )
            ->wherePivot(self::RELATION_NAME_COLUMN, self::RELATION_ALIAS);
    }

    /**
     * 为一个标签附加别名
     *
     * @param mixed $aliases
     * @param bool $create_it
     * @return static
     * @throws \Exception
     */
    public function attachAlias($aliases, $create_it = false)
    {
        $this_aliases = $this->aliases();
        $tags = [$this->id];

        if (!is_array($aliases)) {
            $aliases = [$aliases];
        }

        foreach ($aliases as $alias) {

            if ($alias instanceof static) {

                $tag = $alias;
                if (empty($tag->id)) {
                    $tag->save();
                }

            } else {
                $tag = static::where('id', $alias)
                    ->orWhere('name', $alias)->first();

                //如果不存在标签名自动创建
                if ($create_it and empty($tag) and is_string($alias)) {
                    $tag = static::create(['name' => $alias]);
                }
            }

            if (empty($tag)) {
                throw new \Exception('Invalid Tag Type: '.$alias);
            }

            //保证不重复添加
            if (empty($this_aliases->find($tag->id))) {
                array_push($tags, $tag->id);
            }
        }

        //写入数据库
        $this_aliases->attach(
            $tags,
            [
                self::RELATION_NAME_COLUMN => self::RELATION_ALIAS,
                self::RELATION_WEIGHT_COLUMN => 0,
            ]
        );

        return $this;
    }

    /**
     * 获取别名的主要名称
     *
     * @return static
     */
    public function getPrimaryName()
    {
        $primary = $this->aliases()
            ->orderBy(self::RELATION_WEIGHT_COLUMN, 'desc')
            ->first();

        return $primary ? $primary : $this;
    }

    /**
     * 获取关系表中的左值对应的标签
     *
     * 在标记关系时使用的是左值(one_id)单向关联右值(other_id)的方法
     * 从而避免交叉关联别名
     *
     * @return static $relation_key
     */
    public function getRelationKey()
    {
        $key_id = \DB::table(self::RELATION_TABLE)
            ->where(self::RELATION_NAME_COLUMN, self::RELATION_ALIAS)
            ->where(self::RELATION_KEY_COLUMN, $this->id)
            ->orWhere(self::RELATION_OTHER_COLUMN, $this->id)
            ->value(self::RELATION_KEY_COLUMN);

        return $key_id ? static::find($key_id) : $this;
    }

}