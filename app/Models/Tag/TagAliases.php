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
        $tags = self::wrapToTagIdCollect($aliases, $create_it);

        if (!$enforce) {
            $this->checkRepeat($tags, $on_error);
        }

        self::relationTransfer($tags, $this->id);

        //写入数据库
        $this->aliases()->attach(
            $tags
                //防止重复添加
                ->diff(
                    $this->aliases()->get()->pluck('id')->push($this->id)
                )
                ->all(),
            [
                self::RELATION_NAME_COLUMN => self::RELATION_ALIAS,
                self::RELATION_WEIGHT_COLUMN => 0,
            ]
        );

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
    private function checkRepeat($tags, $on_error)
    {
        $repeat = DB::table(self::RELATION_TABLE)
            ->where(self::RELATION_NAME_COLUMN, self::RELATION_ALIAS)
            ->whereIn(self::RELATION_KEY_COLUMN, $tags)
            ->groupBy(self::RELATION_KEY_COLUMN)
            ->get([self::RELATION_KEY_COLUMN.' as '.self::RELATION_KEY_COLUMN, self::RELATION_KEY_COLUMN.' as '.self::RELATION_OTHER_COLUMN])
            ->merge(
                DB::table(self::RELATION_TABLE)
                    ->where(self::RELATION_NAME_COLUMN, self::RELATION_ALIAS)
                    ->whereIn(self::RELATION_OTHER_COLUMN, $tags)
                    ->where(self::RELATION_KEY_COLUMN, '!=', $this->getPrimaryName()->id)
                    ->get()
            )
        ;

        if($repeat->isEmpty()) {
            return true;
        } else {
            if ($on_error) {
                return $on_error(
                    $repeat->map(function ($tag) {
                        return [
                            'primary_name' => $tag->{self::RELATION_KEY_COLUMN},
                            'alias_name' => $tag->{self::RELATION_OTHER_COLUMN},
                        ];
                    })
                );
            }

            throw new \Exception('禁止交叉添加别名');
        }
    }

    /**
     * 获取关系表中的左值对应的标签，该标签即为所有别名的主要命名
     *
     * 在标记关系时使用的是左值(one_id)单向关联右值(other_id)的方法
     * 从而避免交叉关联别名
     *
     */
    public function getPrimaryName()
    {
        if (isset($this->cache['primary_name'])) {
            return $this->cache['primary_name'];
        }

        $key_id = DB::table(self::RELATION_TABLE)
            ->where(self::RELATION_NAME_COLUMN, self::RELATION_ALIAS)
            ->where(function ($query) {
                return $query
                    ->where(self::RELATION_KEY_COLUMN, $this->id)
                    ->orWhere(self::RELATION_OTHER_COLUMN, $this->id);
            })
            ->value(self::RELATION_KEY_COLUMN);

        return $this->cache['primary_name']
            = ($key_id and $key_id != $this->id)
                ? static::find($key_id)
                : $this;
    }

    /**
     * 把左值修改为$this标签
     * 设置主名不仅仅是更改获取方式，在设置主名的同时还要把所有的关联关系关联到新的主名上
     *
     * @return $this
     */
    public function setToPrimaryName()
    {
        $old_id = $this->getPrimaryName()->id;
        if($old_id == $this->id) return $this;

        DB::table(self::RELATION_TABLE)
            ->where(self::RELATION_KEY_COLUMN, $old_id)
            ->update([self::RELATION_KEY_COLUMN => $this->id]);

        DB::table(self::RELATION_TABLE)
            ->where(self::RELATION_OTHER_COLUMN, $old_id)
            ->update([self::RELATION_OTHER_COLUMN => $this->id]);

        DB::table(self::RELATION_TABLE)
            ->where(self::RELATION_KEY_COLUMN, DB::raw('`'.self::RELATION_OTHER_COLUMN.'`'))
            ->update([self::RELATION_OTHER_COLUMN => $old_id]);

        unset($this->cache['primary_key']);

        return $this;
    }

    /**
     * 直接操作数据库来进行关系的转移
     * 为了维持系统的一致性，转移后仅删除重复的项目，应该在调用后自己维持业务逻辑的需要
     *
     * @param Collection|array $transfer
     * @param int $receiver
     * @return  int
     */
    public static function relationTransfer($transfer, $receiver)
    {
        return
            + DB::table(self::RELATION_TABLE)
                ->whereIn(self::RELATION_KEY_COLUMN, $transfer)
                ->update([self::RELATION_KEY_COLUMN => $receiver])

            + DB::table(self::RELATION_TABLE)
                ->where(self::RELATION_NAME_COLUMN ,self::RELATION_RELATED)
                ->whereIn(self::RELATION_OTHER_COLUMN, $transfer)
                ->update([self::RELATION_OTHER_COLUMN => $receiver])

            + DB::table(self::RELATION_TABLE)
                ->where(self::RELATION_NAME_COLUMN ,self::RELATION_ALIAS)
                ->whereIn(self::RELATION_OTHER_COLUMN, $transfer)
                ->update([self::RELATION_KEY_COLUMN => $receiver])

            + DB::table(self::RELATION_TABLE)
                ->where(self::RELATION_KEY_COLUMN, DB::raw('`'.self::RELATION_OTHER_COLUMN.'`'))
                ->delete()

            + DB::table(self::RELATION_TABLE)
                ->where(self::RELATION_NAME_COLUMN ,self::RELATION_ALIAS)
                ->where(self::RELATION_OTHER_COLUMN, $receiver)
                ->delete()

            ;

            //这里是做主名别名的转换的，暂时不需要了
//            + DB::table(self::RELATION_TABLE)
//                ->where(self::RELATION_NAME_COLUMN ,self::RELATION_ALIAS)
//                ->where(self::RELATION_OTHER_COLUMN, $receiver)
//                ->update([self::RELATION_OTHER_COLUMN => DB::raw('`'.self::RELATION_KEY_COLUMN).'`'])
    }

}