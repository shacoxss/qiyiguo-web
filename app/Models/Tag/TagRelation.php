<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class TagRelation extends Model
{
    //
    const RELATION_TABLE = 'tag_relations';
    const RELATION = 'relation';
    const RELATION_ALIAS= 'alias';
    const RELATION_RELATED= 'related';
    const RELATION_LEFT = 'left_id';
    const RELATION_RIGHT = 'right_id';
    const RELATION_WEIGHT = 'weight';

    public $timestamps = false;

    public function scopeAlias($query)
    {
        return $query->where(self::RELATION, 'alias');
    }

    public function scopeRelated($query)
    {
        return $query->where(self::RELATION, 'related');
    }

    public function scopeLeftIn($query, $tags)
    {
        return $query->whereIn(self::RELATION_LEFT, $tags);
    }

    public function scopeRightIn($query, $tags)
    {
        return $query->whereIn(self::RELATION_RIGHT, $tags);
    }

    public function scopeAllIn($query, $tags)
    {
        return $query
            ->whereIn(self::RELATION_LEFT, $tags)
            ->orWhereIn(self::RELATION_RIGHT, $tags);
    }

    public function scopeAllHas($query, $id)
    {
        return $query
            ->where(self::RELATION_LEFT, $id)
            ->orWhere(self::RELATION_RIGHT, $id)
        ;
    }

    public function scopeGetId($query)
    {
        return $query
            ->get([
                self::RELATION_LEFT,
                self::RELATION_RIGHT
            ]);
    }

    /**
     * 直接操作数据库来进行关系的转移
     * 为了维持系统的一致性，转移后仅删除重复的项目，应该在调用后自己维持业务逻辑的需要
     *
     * @param Collection|array $transfer
     * @param int $receiver
     * @param bool $with_alias
     * @return int
     */
    public static function relationTransfer($transfer, $receiver, $with_alias = false)
    {
        return
            + self
                ::leftIn($transfer)
                ->update([self::RELATION_LEFT => $receiver])

            + self
                ::related()
                ->rightIn($transfer)
                ->update([self::RELATION_RIGHT => $receiver])

            + self
                ::where(self::RELATION_LEFT, \DB::raw('`'.self::RELATION_RIGHT.'`'))
                ->delete()

            + $with_alias and

            + self
                ::alias()
                ->rightIn($transfer)
                ->update([self::RELATION_LEFT => $receiver])

            + self
                ::alias()
                ->where(self::RELATION_RIGHT, $receiver)
                ->delete()

            ;
    }

}
