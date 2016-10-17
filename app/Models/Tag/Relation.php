<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    //
    const TABLE    = 'tag_relations';
    const RELATION          = 'relation';
    const RELATION_ALIAS    = 'alias';
    const RELATION_SIMILAR  = 'similar';
    const LEFT     = 'left_id';
    const RIGHT    = 'right_id';
    const WEIGHT   = 'weight';

    protected $table        = self::TABLE;
    public $timestamps      = false;

    public function scopeAlias($query)
    {
        return $query->where(self::RELATION, self::RELATION_ALIAS);
    }

    public function scopeSimilar($query)
    {
        return $query->where(self::RELATION, self::RELATION_SIMILAR);
    }

    public function scopeLeftIn($query, $ids)
    {
        return $query->whereIn(self::LEFT, $ids);
    }

    public function scopeRightIn($query, $ids)
    {
        return $query->whereIn(self::RIGHT, $ids);
    }

    public function scopeAllIn($query, $ids)
    {
        return $query
            ->whereIn(self::LEFT, $ids)
            ->orWhereIn(self::RIGHT, $ids);
    }

    public function scopeAllHas($query, $id)
    {
        return $query
            ->where(self::LEFT, $id)
            ->orWhere(self::RIGHT, $id)
        ;
    }

    public function scopeOnlyId($query)
    {
        return $query
            ->get([
                self::LEFT,
                self::RIGHT
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
                ->update([self::LEFT => $receiver])

            + self
                ::similar()
                ->rightIn($transfer)
                ->update([self::RIGHT => $receiver])

            + self
                ::where(self::LEFT, \DB::raw('`'.self::RIGHT.'`'))
                ->delete()

            + $with_alias and

            + self
                ::alias()
                ->rightIn($transfer)
                ->update([self::LEFT => $receiver])

            + self
                ::alias()
                ->where(self::RIGHT, $receiver)
                ->delete()

            ;
    }

}
