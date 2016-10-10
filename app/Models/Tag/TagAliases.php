<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait TagAliases
{
    protected $cache;
    /**
     * @return BelongsToMany
     */
    public function aliases()
    {
        return $this->getPrimaryName()
            ->belongsToMany(
                static::class,
                self::RELATION_TABLE,
                self::RELATION_KEY_COLUMN,
                self::RELATION_OTHER_COLUMN
            )
            ->wherePivot(self::RELATION_NAME_COLUMN, self::RELATION_ALIAS)
            ->withPivot(self::RELATION_WEIGHT_COLUMN);
    }

    /**
     * 为一个标签附加别名
     *
     * @param array $aliases
     * @param bool $create_it
     * @return static
     * @throws \Exception
     */
    public function attachAliases(array $aliases, $create_it = false)
    {
        $tags = collect($aliases)
            //把$aliases 转换成id集合
            ->map(function ($alias) use($create_it) {
                if ($alias instanceof static) {
                    return $alias->id;
                }

                if (is_numeric($alias)) {
                    return $alias;
                }

                if (is_string($alias)) {
                    if ($tag = self::where('name', $alias)->value('id')) {
                        return $tag;
                    }

                    if ($create_it) {
                        return self::create(['name' => $alias])->id;
                    }
                }

                throw new \Exception('Invalid Tag Type: '.$alias);
            })
            //把它自己也设置成别名
            ->push($this->id)
            //防止重复添加
            ->diff($this->aliases()->get()->pluck('id'))
            ->all();

        //写入数据库
        $this->aliases()->attach(
            $tags,
            [
                self::RELATION_NAME_COLUMN => self::RELATION_ALIAS,
                self::RELATION_WEIGHT_COLUMN => 0,
            ]
        );

        return $this;
    }

    /**
     * 获取关系表中的左值对应的标签，该标签即为所有别名的主要命名
     *
     * 在标记关系时使用的是左值(one_id)单向关联右值(other_id)的方法
     * 从而避免交叉关联别名
     *
     * @return static $primary_name_tag
     */
    public function getPrimaryName()
    {
        if (isset($this->cache['relation_key'])) {
            return $this->cache['relation_key'];
        }

        $key_id = \DB::table(self::RELATION_TABLE)
            ->where(self::RELATION_NAME_COLUMN, self::RELATION_ALIAS)
            ->where(self::RELATION_KEY_COLUMN, $this->id)
            ->orWhere(self::RELATION_OTHER_COLUMN, $this->id)
            ->value(self::RELATION_KEY_COLUMN);

        return $this->cache['relation_key'] = $key_id ? static::find($key_id) : $this;
    }

    /**
     * 把左值修改为$this标签
     *
     * @return $this
     */
    public function setToPrimaryName()
    {
        $this->aliases()->update([self::RELATION_KEY_COLUMN => $this->id]);
        return $this;
    }

}