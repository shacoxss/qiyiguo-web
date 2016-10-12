<?php

namespace App\Models\Tag;

trait RelationAble
{
    public function scopeRelation($query)
    {
        return $query->table('tag_relations');
    }
    public function scopeAlias($query)
    {
        return $query->where(self::RELATION, 'alias');
    }

    public function scopeRelated($query)
    {
        return $query->wehre(self::RELATION, 'related');
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
}