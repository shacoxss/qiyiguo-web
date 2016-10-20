<?php

namespace App\Models\Tag;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;
use Symfony\Component\Process\Exception\InvalidArgumentException;

/**
 * @property int  id
 * @property string  name
 * @property string  url
 * @property string  pinyin
 * @property string  primary_id
 * @property $this  primary_tag
 * @property int status
 * @property string abbr
 */
class Tag extends Model
{
    use RelationAble, Aliases, Similars, BaiduIndexAble;

    const PINYIN_BREAK = '';
    const TAG_URL = '/tag/';
    const AUTO_SUFFIX_LIMIT = 1;
    //
    protected $guarded = [];

    /**auto compute pinyin
     *
     * @return static
     */
    public function autoComputePinyin()
    {
        $pinyin = new Pinyin();
        $this->pinyin = strtolower($pinyin->permalink($this->name, self::PINYIN_BREAK));
        $this->abbr = strtolower($pinyin->abbr($this->name, self::PINYIN_BREAK));

        //set the url unique
        while (self::where('pinyin', $this->pinyin)->first()) {
            $this->pinyin .= self::PINYIN_BREAK.strtolower(Str::random(self::AUTO_SUFFIX_LIMIT));
        }
        while (self::where('abbr', $this->abbr)->first()) {
            $this->abbr .= self::PINYIN_BREAK.strtolower(Str::random(self::AUTO_SUFFIX_LIMIT));
        }

        return $this;
    }

    /**
     * 检测标签名是否有效
     *
     * @return string
     */
    public function isInvalidName()
    {
        $error_message = '';

        if (empty($this->name)) {
            $error_message = '标签名不能为空。';
        }

        elseif (Tag::where('name', $this->name)->first()) {
            $error_message = "重复的标签名：'$this->name'。";
        }

        return $error_message;
    }

    /**
     * 模糊搜索pinyin和name
     *
     * @param string $query
     *
     * @return \Illuminate\Database\Eloquent\Collection
     *
     */

    public static function search($query)
    {
        function str_split_unicode($str, $l = 1) {
            if ($l > 0) {
                $ret = array();
                $len = mb_strlen($str, "UTF-8");
                for ($i = 0; $i < $len; $i += $l) {
                    $ret[] = mb_substr($str, $i, $l, "UTF-8");
                }
                return $ret;
            }
            return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
        }

        $where = '%';
        foreach (str_split_unicode($query) as $word) {
            $where .= $word.'%';
        }

        return self::where('name', 'like', $where)
            ->orWhere('pinyin', 'like', $where)
            ->get();
    }

    /**
     * 把一组标签id、标签名、Tag实例包装成Tag id 集合
     *
     * @param array $tags
     * 如果标签名不存在，是否创建它
     * @param bool $create_it
     * @param $from_name
     * @return \Illuminate\Support\Collection
     */
    public static function wrapToIds($tags, $create_it = false , $from_name = false)
    {
        return collect($tags)
            ->map(function ($alias) use($create_it, $from_name) {
                
                if ($alias instanceof static) {
                    return $alias->id;
                }

                if (is_numeric($alias) && !$from_name) {
                    return $alias;
                }

                if ($from_name || is_string($alias)) {
                    $alias = trim($alias);
                    if ($tag = self::where('name', $alias)->value('id')) {
                        return $tag;
                    }

                    if ($create_it) {
                        return self::create(['name' => $alias])->id;
                    }
                }

                throw new \Exception('Invalid Tag Type: '.$alias);
            });
    }

    /**
     *
     * 标签属性多对多
     * @return HasMany;
     *
     */

     public function attributes()
     {
         return $this->hasMany('App\Models\Tag\TagAttribute');
     }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function archives()
    {
         return $this->belongsToMany('App\Models\Archive\Archive');
    }

    public function getUrlAttribute()
    {
        if ($this->current_url) return $this->current_url;

        return self::TAG_URL . (mb_strlen($this->pinyin) > 10 ? $this->abbr : $this->pinyin);
    }

}
